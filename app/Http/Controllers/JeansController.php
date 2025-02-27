<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeans;
use Illuminate\Support\Facades\Storage;

class JeansController extends Controller
{
    // Display all jeans items
    public function index()
    {
        $jeans = Jeans::all(); // Fetch all jeans items from the database
        return view('jeans', compact('jeans'));
    }

    // Show the form to create a new jeans item
    public function create()
    {
        return view('jeans.create'); // Corrected view path
    }

    // Store a new jeans item in the database
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

        // Handle the image upload
        $imagePath = $request->file('image')->store('products', 'public');

        // Create a new jeans item
        Jeans::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category, // Allow dynamic category
            'image' => $imagePath,
        ]);

        return redirect()->route('jeans.index')->with('success', 'Jeans item added successfully!');
    }

    // Delete a jeans item
    public function destroy($id)
    {
        $jeans = Jeans::findOrFail($id);

        // Check if the image exists before deleting
        if ($jeans->image && Storage::disk('public')->exists($jeans->image)) {
            Storage::disk('public')->delete($jeans->image);
        }

        // Delete the record from the database
        $jeans->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    
public function edit($id)
{
    // Find the item by ID
    $item = Jeans::findOrFail($id);

    // Return the edit view with the item data
    return view('jeans.edit', compact('item'));
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
    $item = Jeans::findOrFail($id);

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
    return redirect()->route('jeans.index')->with('success', 'Item updated successfully');
}
public function print(){
    return view('jeans');
}
}
