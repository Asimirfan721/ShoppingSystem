<?php

namespace App\Http\Controllers;
// 
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function __construct()  
    {
       // $this->middleware('practice');
    }

    public function index(){
        return view('practice');
    }
    public function create(){
        return view('practice');
    }

    public function edit(){
        return view('practice');

    }

}
?>