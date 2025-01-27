<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeans; // Import the Jeans model

class JeansController extends Controller
{
    public function index()
    {
        // Fetch all jeans items from the database
        $jeans = Jeans::all();

        // Pass the jeans data to the view
        return view('jeans', compact('jeans'));
    }
}
