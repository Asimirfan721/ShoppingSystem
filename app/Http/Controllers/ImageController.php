<?php

namespace App\Http\Controllers; // define namespace for the controller 

use Illuminate\Http\Request; // import the request class  
use App\Http\Controllers\ImageController; // import the image controller class 
use Illuminate\Support\Facades\Route; // import the route facade 

use App\Models\Image; // import the image model

class ImageController extends Controller // define the class 
{
    public function store(Request $request) // define the store method   
    {
        $request->validate([ // validate the request 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();   // get the image name 
        $request->image->move(public_path('images'), $imageName); // move the image to the public folder 

        $image = new Image(); // create a new image 
        $image->name = $imageName; //  save the image name here
        $image->save(); // save the image 

        return back()->with('success','Image uploaded successfully.')->with('image',$imageName); // return back with success message
    }

    public function index() // define the index method 
    {
        $images = Image::all(); // get all the images 
        return view('image', compact('images')); // return the view with the images
    }
}