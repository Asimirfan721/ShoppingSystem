<?php
namespace App\Http\Controllers; // define namespace for the controller 
use App\Models\Electronics; // import the electronics model
use App\Http\Controllers\Controller; // import the controller class
use Illuminate\Support\Facades\Storage; // import the storage facade
use Illuminate\Http\Request; // import the request class

class ElectronicsController extends Controller // define the class 
{
    public function index() // define the index method
    {

        $items = Electronics::all();  // get all the electronics items 

        return view('electronics', compact('items')); // return the view with the items 
    } 
    public function create() // define the create method 
    {
        return view('electronics.create'); // return the create view 
    }

    public function store(Request $request) // define the store method 
    {
        
        $validated = $request->validate([ // validate the request 
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        
        if ($request->hasFile('image')) { // check if the request has an image 
              $imagePath = $request->file('image')->store('electronics', 'public'); // store the image in the public folder 
        }
       
         Electronics::create([ // create the electronics 
            'name' => $request->name, // save the name 
            'description' => $request->description, // save the description 
            'price' => $request->price, // save the price 
            'image' => $imagePath,  ]); // save the image path
    
        return redirect()->route('electronics.create')->with('success', 'Item added successfully!'); // redirect to the electronics page with success message
    }
    public function destroy($id) // define the destroy method 
{
    $electronics = electronics::findOrFail($id); // find the electronics by id 

    // Delete image from storage
    if ($electronics->image) { // check if the image exists 
        Storage::delete('public/' . $electronics->image); // delete the image from the storage 
    }

    // Delete the record from database
    $electronics->delete();

    return redirect()->route('electronics.index')->with('success', 'Shirt image deleted successfully.'); // redirect to the electronics page with success message
}
public function edit($id) // define the edit method 
{
    // Find the item by ID
    $item = Electronics::findOrFail($id); // find the electronics by id 

    // Return the edit view with the item data
    return view('electronics.edit', compact('item')); // return the edit view with the item data 
}
public function update(Request $request, $id) // define the update method 
{
    // Validate the request
    $request->validate([ // validate the request 
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the item by ID
    $item = Electronics::findOrFail($id);

    // Update the item details
    $item->name = $request->input('name'); // update the name 
    $item->description = $request->input('description'); // update the description 
    $item->price = $request->input('price'); // update the price 

    // Handle image upload
    if ($request->hasFile('image')) { // check if the request has an image
        $imagePath = $request->file('image')->store('images', 'public'); // store the image in the public folder 
        $item->image = $imagePath; // save the image path 
    }

    // Save the updated
    $item->save();

    // Redirect back with success  message
    return redirect()->route('electronics.index')->with('success', 'Item updated successfully'); // return direct
}

}
   