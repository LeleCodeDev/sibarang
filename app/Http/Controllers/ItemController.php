<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $role = Auth::user()->role;

        $items = Item::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%");
        })->with('category')->latest()->paginate(10);

        $categories = Category::all();

        if($role == 'admin') {
            return view('Admin.Item.index', compact('items', 'categories'));
        } elseif($role == 'operator') {
            return view('Operator.Item.index', compact('items', 'categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'quantity' => 'required|integer|min:0',
            'image' => 'file|nullable|max:5000|mimes:png,jpg,jpeg',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('product_images', $request->image);
        }

        Item::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'image' => $path,
            'status' => $validated['quantity'] > 0 ? 'available' : 'unavailable',
        ]);

        return redirect()->route('item.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required',
            'quantity' => 'required|integer|min:0',
            'image' => 'file|nullable|max:5000|mimes:png,jpg,jpeg',
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            $newImagePath = Storage::disk('public')->put('product_images', $request->file('image'));
            $validated['image'] = $newImagePath;
        } else {
            $validated['image'] = $item->image;
        }

        $item->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'quantity' => $validated['quantity'],
            'image' => $validated['image'],
            'status' => $validated['quantity'] > 0 ? 'available' : 'unavailable',
        ]);

        return redirect()->route('item.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
