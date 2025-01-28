<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeans; // Import the Jeans model

class JeansController extends Controller
{
    // Display all jeans items
    public function index()
    {
        // Fetch all jeans items from the database
        $jeans = Jeans::all();

        // Pass the jeans data to the view
        return view('jeans', compact('jeans'));
    }

    // Show the form to create a new jeans item
    public function create()
    {
        return view('electronics.create'); // Update this if a dedicated view is needed for jeans
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
        $imagePath = $request->file('image')->store('jeans', 'public');

        // Create a new jeans item
        Jeans::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => 'Jeans',
            'image' => $imagePath,
        ]);

        // Redirect to the jeans index page with a success message
        return redirect()->route('jeans.index')->with('success', 'Jeans item added successfully!');
    }
}
