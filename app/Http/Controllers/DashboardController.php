<?php

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers; // Ensure you have this namespace

use Illuminate\Http\Request; // Ensure you have this namespace

class DashboardController extends Controller //  dashboard controller class extends the controller class
{
    public function index()    // Define the index method 
    {
        return view('dashboard');  // Ensure you have a view named 'dashboard'
    }
}
