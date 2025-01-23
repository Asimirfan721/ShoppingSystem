<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShirtsController extends Controller
{
    public function index()
    {
        return view('Shirts');
    } //
}
