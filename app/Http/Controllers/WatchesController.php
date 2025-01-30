<?php
namespace App\Http\Controllers;
use App\Models\Watches;
use Illuminate\Http\Request;

class WatchesController extends Controller
{
    public function index()
    {
        // Fetch all jeans items from the database
        $watches = watches::all();

        // Pass the jeans data to the view
        return view('watches', compact('watches'));
    }
    public function create()
    {
        return view('electronics.create'); // Update this if a dedicated view is needed for jeans
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

        // Handle the image upload
        $imagePath = $request->file('image')->store('watches', 'public');

        // Create a new jeans item
        Watches::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => 'Shirts',
            'image' => $imagePath,
        ]);

        // Redirect to the jeans index page with a success message
        return redirect()->route('watches.index')->with('success', 'Watche added successfully!');
    }


}
