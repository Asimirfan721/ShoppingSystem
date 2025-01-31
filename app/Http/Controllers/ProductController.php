<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function electronics()
    {
        return view('electronics');
    }

    public function clothes()
    {
        return view('clothes');
    }

    public function jeans()
    {
        return view('jeans');
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
