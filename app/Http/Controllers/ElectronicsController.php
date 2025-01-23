<?php
namespace App\Http\Controllers;
use App\Models\Electronics;
use App\Models\ElectronicsItem;
use Illuminate\Http\Request;

class ElectronicsController extends Controller
{
    public function create()
    {
        return view('electronics.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('electronics', 'public');
        }

        // Create a new item and save it to the database
        Electronics::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Store the image path
        ]);

        return redirect()->route('electronics.create')->with('success', 'Item added successfully!');
    }
    public function index()
    {
        // Fetch electronics items from the database
        $items = Electronics::all(); // Replace `Electronic` with your actual model name

        // Pass the items to the view
        return view('electronics', compact('items'));
    }
}
