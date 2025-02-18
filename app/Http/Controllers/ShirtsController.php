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
            'price' => $request->price,
            'category' => 'Shirts',
            'image' => $imagePath,
        ]);
   
        // Redirect to tj page with a success message
        return redirect()->route('shirts.index')->with('success', 'Shirts item added successfully!');
    }
    public function destroy($id)
{
    $shirts = Shirts::findOrFail($id);

    // Delete image from storage
    if ($shirts->image) {
        Storage::delete('public/' . $shirts->image);
    }

    // Delete the record from database
    $shirts->delete();

    return redirect()->route('shirts.index')->with('success', 'Shirt image deleted successfully.');
}

}
 