<?php
namespace App\Http\Controllers;
use App\Models\Electronics;
use App\Models\ElectronicsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElectronicsController extends Controller
{
    public function index()
    {

        $items = Electronics::all(); 

        return view('electronics', compact('items'));
    }
    public function create()
    {
        return view('electronics.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        
        if ($request->hasFile('image')) {
              $imagePath = $request->file('image')->store('electronics', 'public');
        }
       
         Electronics::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,  ]);
    
        return redirect()->route('electronics.create')->with('success', 'Item added successfully!');
    }
    public function destroy($id)
{
    $electronics = electronics::findOrFail($id);

    // Delete image from storage
    if ($electronics->image) {
        Storage::delete('public/' . $electronics->image);
    }

    // Delete the record from database
    $electronics->delete();

    return redirect()->route('electronics.index')->with('success', 'Shirt image deleted successfully.');
}
     
}
