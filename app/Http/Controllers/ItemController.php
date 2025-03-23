<?php
namespace App\Http\Controllers; // define name space for the controller

use Illuminate\Http\Request; // import the request class 
use App\Models\Electronics; // import the electronics model
use App\Models\clothes; // import the clothes model
use App\Models\Jeans; // import the jeans model
use App\Models\Shirts; // import the shirts model
use App\Models\Watches; // import the watches model

class ItemController extends Controller // define the class item controller extends the controller class
{
    public function store(Request $request) // define the store method
    {
        // Validate the input
        $data = $request->validate([ // validate the request
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string',
        ]);

        // Handle the image if exists in the request
        if ($request->hasFile('image')) { // check if the request has an image 
            $data['image'] = $request->file('image')->store('products', 'public'); // store the image in the public folder 
        }
  
        // Save the data into the on the category  
        switch ($request->category) { // switch the category here
            case 'electronics': // case for electronics 
                Electronics::create($data); // create the electronics
                break;  // break the case
            case 'clothes': // case for clothes 
                Clothes::create($data); // create the clothes 
                break;  // break the case
            case 'jeans': // case for jeans
                Jeans::create($data); // create the jeans
                break; 
            case 'shirts':
                Shirts::create($data);
                break;
            case 'watches':
                Watches::create($data);
                break;
            default:
                return redirect()->back()->with('error', 'Invalid category selected'); // redirect back with error message 
        }

        return redirect()->route($request->category . '.index')->with('success', 'Item added successfully'); // redirect to the category index page with success message
    } 
}