<?php

namespace App\Http\Controllers;
use App\Models\clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    public function index()
    {
        // Fetch all clothes items
        $clothes = Clothes::all();

        // Pass the data to the clothes view
        return view('clothes', compact('clothes'));
    }
    public function create()
    {
        return view('electronics.create');
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
    $imagePath = $request->file('image')->store('clothes', 'public');

    // Create a new clothes item
    Clothes::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'category' => 'Clothes',
        'image' => $imagePath,
    ]);

    // Redirect to the clothes page with a success message
    return redirect()->route('clothes')->with('success', 'Item added successfully!');
}

}
