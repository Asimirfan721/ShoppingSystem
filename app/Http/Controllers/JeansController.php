<?php 
namespace App\Http\Controllers; // Define the namespace for the controller 

use Illuminate\Http\Request; // Import the request class 
use App\Models\Jeans; // Import the jeans model 
use Illuminate\Support\Facades\Storage; // Import the storage facade

class JeansController extends Controller
{
    // Display all jeans items
    public function index()
    {
        $jeans = Jeans::all(); // Fetch all jeans items from the database
        return view('jeans', compact('jeans')); // Return the view with the jeans items
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
            'description' => $request->description, // description controller 
            'price' => $request->price, // price 
            'category' => $request->category, // Allow dynamic category
            'image' => $imagePath,
        ]);

        return redirect()->route('jeans.index')->with('success', 'Jeans item added successfully!'); // Corrected route name and success message 
    }

    // Delete a jeans item
    public function destroy($id)
    {
        $jeans = Jeans::findOrFail($id); // Find the jeans item by ID  here

        // Check if the image exists before deleting
        if ($jeans->image && Storage::disk('public')->exists($jeans->image)) { // Check if the image exists in the storage 
            Storage::disk('public')->delete($jeans->image); // Delete the image from the storage 
        }

        // Delete the record from the database
        $jeans->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.'); // Redirect back with success message 
    }
    
public function edit($id) // Define the edit method 
{
    // Find the item by ID
    $item = Jeans::findOrFail($id);

    // Return the edit view with the item data
    return view('jeans.edit', compact('item'));
}
public function update(Request $request, $id) // Define the update method 
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
    $item->name = $request->input('name'); // Update the name 
    $item->description = $request->input('description'); // Update the description 
    $item->price = $request->input('price'); // Update the price 

    // Handle image upload
    if ($request->hasFile('image')) { // Check if the request has an image 
        $imagePath = $request->file('image')->store('images', 'public'); // Store the image in the public folder 
        $item->image = $imagePath; // Save the image path 
    }

    // Save the updated item
    $item->save();

    // Redirect back with success message
    return redirect()->route('jeans.index')->with('success', 'Item updated successfully'); // Redirect to the jeans index page with success message
}
public function print(){
    return view('jeans');
}
}
