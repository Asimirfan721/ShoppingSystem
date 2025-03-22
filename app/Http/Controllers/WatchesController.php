<?php
namespace App\Http\Controllers;  //    Ensure you have this namespace
use App\Models\Watches;  // Ensure you have this use statement
use Illuminate\Http\Request; // define request 

use Illuminate\Support\Facades\Storage;
 
class WatchesController extends Controller
{
    public function index()
    {
        // Fetch all se
        $watches = watches::all();

        // Pass the jeansta to the view
        return view('watches', compact('watches'));
    }
    public function create()
    {
        return view('electronics.create'); // Update this ifeans
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

        // Handle the imaad
        $imagePath = $request->file('image')->store('watches', 'public');

        // Create a new jeans item
        Watches::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => 'Shirts',
            'image' => $imagePath,
        ]);

        // Redirect to the jeuccess message
        return redirect()->route('watches.index')->with('success', 'Watche added successfully!');
    }
    public function destroy($id)
    {
        $watches = Watches::findOrFail($id);
    
        // Delete image from storage
        if ($watches->image) {
            Storage::delete('public/' . $watches->image);
        }
    
        // Delete the record from database
        $watches->delete();
    
        return redirect()->route('watches.index')->with('success', 'Watches image deleted successfully.');
    }


    public function edit($id)
    {
        // Find the item by ID
        $item = Watches::findOrFail($id);
    
        // Return the edit view with the item data
        return view('watches.edit', compact('item'));
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
        $item = Watches::findOrFail($id);
    
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
        return redirect()->route('watches.index')->with('success', 'Item updated successfully');
    }

}
