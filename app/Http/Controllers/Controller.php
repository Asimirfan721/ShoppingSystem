<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }
}
