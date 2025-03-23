<?php

namespace App\Http\Controllers;
use App\Models\Shirts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ShirtsController extends Controller
{
    public function index()
    {
        // Fetch all je database
        $shirts = Shirts::all();

        // Pass the jeans data to the view
        return view('shirts', compact('shirts'));
    }
    public function create()
    {
        return view('electronics.create'); // Update this if a ew is needed for jeans
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
        ]);

        // Handle the image
        $imagePath = $request->file('image')->store('shirts', 'public');

        // Create a new jeans item
        Shirts::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price, // price request
            'category' => 'Shirts', // select category  here
            'image' => $imagePath, // image path
        ]);
   
        // Redirect to tj page with a success message
        return redirect()->route('shirts.index')->with('success', 'Shirts item added successfully!');  //   
    }
    public function destroy($id)
{
    $shirts = Shirts::findOrFail($id); // finding id from database 

    // Delete image from storage
    if ($shirts->image) {
        Storage::delete('public/' . $shirts->image);
    }

    // Delete the record from database
    $shirts->delete();

    return redirect()->route('shirts.index')->with('success', 'Shirt image deleted successfully.');
}

public function edit($id)
{
    // Find the item by ID
    $item = Shirts::findOrFail($id);

    // Return the edit view with the item data
    return view('shirts.edit', compact('item'));
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
    $item = Shirts::findOrFail($id);

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
    return redirect()->route('shirts.index')->with('success', 'Item updated successfully');
}
}
 