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

}
