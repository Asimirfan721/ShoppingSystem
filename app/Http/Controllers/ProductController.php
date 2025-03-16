<?php
namespace App\Http\Controllers; // Ensure you have this namespace

use Illuminate\Http\Request;

class ProductController extends Controller // product controller class extends the controller class
{
    public function electronics() // define the electronics method
    {
        return view('electronics'); // return the view
    
    }

    public function clothes()
    {
        return view('clothes'); // return the view
    } 

    public function jeans() // define the jeans method
    {
        return view('jeans'); // return the view
    } 

    public function shirts()
    {
        return view('shirts');
    }

    public function watches()
    {
        return view('watches');
    }
}
