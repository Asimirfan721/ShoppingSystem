<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        $image = new Image();
        $image->name = $imageName;
        $image->save();

        return back()->with('success','Image uploaded successfully.')->with('image',$imageName);
    }

    public function index()
    {
        $images = Image::all();
        return view('image', compact('images'));
    }
}