<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
        $query = BorrowRequest::with(['borrower', 'operator', 'item']);

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('borrower', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            })->orWhereHas('item', function ($q) use ($search) {
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
    public function store(Request $request, $itemId)
    {
        $user = Auth::user();
        $item = Item::findOrFail($itemId);

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
            'return_date' => 'required|date',
        ]);

        if ($item->quantity < $validated['quantity']) {
            return redirect()->back()->withErrors([
                'quantity' => "quantity may not be greater than the available stock (max {$item->quantity}"
            ])->withInput();
        }

        BorrowRequest::create([
            'borrower_id' => $user->id,
            'quantity' => $validated['quantity'],
            'status' => 'processed',
            'request_date' => now(),
            'return_date' => $validated['return_date'],
            'item_id' => $itemId,
        ]);

        return redirect()->route('item.item-list')
            ->with('success', 'Borrow request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BorrowRequest $borrowRequest)
    {
        $borrowRequest->load(['borrower', 'operator', 'item']);
        return view('Admin.BorrowRequest.show', compact('borrowRequest'));
    }

    /**
     * Approve the borrow request.
     */
    public function approve($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        if ($borrowRequest->status !== 'processed') {
            return back()->with('error', 'This request has already been processed.');
        }

        $item = $borrowRequest->item;
        if ($item->quantity < $borrowRequest->quantity) {
            return back()->with('error', "Item '{$item->name}' doesn't have enough quantity available.");
        }

        $borrowRequest->update([
            'status' => 'approved',
            'operator_id' => Auth::id()
        ]);

        $item->quantity -= $borrowRequest->quantity;

        if ($item->quantity <= 0) {
            $item->status = 'unavailable';
        }

        $item->save();

        return back()->with('success', 'Borrow request approved successfully.');
    }

    /**
     * Reject the borrow request.
     */
    public function reject($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        if ($borrowRequest->status !== 'processed') {
            return back()->with('error', 'This request has already been processed.');
        }

        $borrowRequest->update([
            'status' => 'rejected',
            'operator_id' => Auth::id()
        ]);

        return back()->with('success', 'Borrow request rejected successfully.');
    }

    /**
     * Mark items as returned.
     */
    public function markAsReturn($id)
    {
        $borrowRequest = BorrowRequest::findOrFail($id);

        if ($borrowRequest->status !== 'approved') {
            return back()->with('error', 'Only approved requests can be marked as returned.');
        }

        $borrowRequest->update([
            'status' => 'returned',
            'operator_id' => Auth::id()
        ]);

        $item = $borrowRequest->item;
        $item->quantity += $borrowRequest->quantity;
        $item->status = 'available';
        $item->save();

        $borrowRequest->update(['status' => 'returned']);

        return back()->with('success', 'Items have been marked as returned successfully.');
    }
}
