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
        return view('practice'); // return the view 
    }
    public function create(){ // create method
        return view('practice'); // return the view
    }

    public function edit(){
        return view('practice');

    }

}
?>