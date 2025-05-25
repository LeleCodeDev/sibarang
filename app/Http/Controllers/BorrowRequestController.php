<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\BorrowItem;
use Illuminate\Http\Request;
use App\Models\BorrowRequest;
use Illuminate\Support\Facades\Auth;

class BorrowRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BorrowRequest::with(['borrower', 'operator', 'requestItems.item']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('borrower', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('requestItems.item', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $borrowRequests = $query->latest()->paginate(10)->withQueryString();

        return view('Operator.Request.index', compact('borrowRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::where('status', 'available')
            ->where('quantity', '>', 0)
            ->get();

        return view('Admin.BorrowRequest.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'request_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:request_date',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        // Check if all items are available in requested quantity
        foreach ($request->items as $requestedItem) {
            $item = Item::find($requestedItem['id']);

            if (!$item || $item->quantity < $requestedItem['quantity']) {
                return back()->with('error', "Item '{$item->name}' doesn't have enough quantity available.")->withInput();
            }
        }

        // Create borrow request
        $borrowRequest = BorrowRequest::create([
            'borrower_id' => Auth::id(),
            'status' => 'processed',
            'request_date' => $request->request_date,
            'return_date' => $request->return_date,
            'notes' => $request->notes
        ]);

        // Create request items
        foreach ($request->items as $requestedItem) {
            BorrowItem::create([
                'borrow_request_id' => $borrowRequest->id,
                'item_id' => $requestedItem['id'],
                'quantity' => $requestedItem['quantity'],
                'status' => 'processed'
            ]);
        }

        return redirect()->route('borrow-request.index')
            ->with('success', 'Borrow request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRequest $borrowRequest)
    {
        $borrowRequest->load(['borrower', 'operator', 'requestItems.item']);
        return view('Admin.BorrowRequest.show', compact('borrowRequest'));
    }

    /**
     * Approve the borrow request.
     */
    public function approve($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        // Check if the request is processed
        if ($borrowRequest->status !== 'processed') {
            return back()->with('error', 'This request has already been processed.');
        }

        // Check item availability
        foreach ($borrowRequest->requestItems as $requestItem) {
            $item = $requestItem->item;

            if ($item->quantity < $requestItem->quantity) {
                return back()->with('error', "Item '{$item->name}' doesn't have enough quantity available.");
            }
        }

        // Update request status
        $borrowRequest->update([
            'status' => 'approved',
            'operator_id' => Auth::id()
        ]);

        // Update item quantities and status
        foreach ($borrowRequest->requestItems as $requestItem) {
            $item = $requestItem->item;
            $item->quantity -= $requestItem->quantity;

            if ($item->quantity <= 0) {
                $item->status = 'not_available';
            }

            $item->save();

            // Update request item status
            $requestItem->update(['status' => 'approved']);
        }

        return back()->with('success', 'Borrow request approved successfully.');
    }

    /**
     * Reject the borrow request.
     */
    public function reject($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        // Check if the request is processed
        if ($borrowRequest->status !== 'processed') {
            return back()->with('error', 'This request has already been processed.');
        }

        // Update request status
        $borrowRequest->update([
            'status' => 'rejected',
            'operator_id' => Auth::id()
        ]);

        // Update request item status
        foreach ($borrowRequest->requestItems as $requestItem) {
            $requestItem->update(['status' => 'rejected']);
        }

        return back()->with('success', 'Borrow request rejected successfully.');
    }

    /**
     * Mark items as returned.
     */
    public function markAsReturn($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        // Check if the request is approved
        if ($borrowRequest->status !== 'approved') {
            return back()->with('error', 'Only approved requests can be marked as returned.');
        }

        // Update request status
        $borrowRequest->update([
            'status' => 'returned',
            'operator_id' => Auth::id()
        ]);

        // Return items to inventory
        foreach ($borrowRequest->requestItems as $requestItem) {
            $item = $requestItem->item;
            $item->quantity += $requestItem->quantity;
            $item->status = 'available';
            $item->save();

            // Update request item status
            $requestItem->update(['status' => 'returned']);
        }

        return back()->with('success', 'Items have been marked as returned successfully.');
    }
}
