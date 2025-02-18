<?php

namespace App\Http\Controllers;
use App\Models\clothes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index()
    {

        $clothes = Clothes::all();

       
        return view('clothes', compact('clothes'));
    }
    public function create()
    {
        return view('electronics.create');
    }
    public function store(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category' => 'required|string',
    ]);


    $imagePath = $request->file('image')->store('clothes', 'public');

    Clothes::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => 'Clothes',
        'image' => $imagePath,
    ]);

    
    return redirect()->route('clothes')->with('success', 'Item added successfully!');
}
public function destroy($id)
{
    $clothes = Clothes::findOrFail($id);

    // Delete image from storage
    if ($clothes->image) {
        Storage::delete('public/' . $clothes->image);
    }

    // Delete the record from database
    $clothes->delete();

    return redirect()->route('clothes.index')->with('success', 'Shirt image deleted successfully.');
}

public function edit($id)
{
    // Find the item by ID
    $item = Clothes::findOrFail($id);

    // Return the edit view with the item data
    return view('clothes.edit', compact('item'));
}
public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the item by ID
    $item = Clothes::findOrFail($id);

    // Update the item details
    $item->name = $request->input('name');
    $item->description = $request->input('description');
    $item->price = $request->input('price');

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $item->image = $imagePath;
    }

    // Save the updated item
    $item->save();

    // Redirect back with success message
    return redirect()->route('clothes.index')->with('success', 'Item updated successfully');
}
}
