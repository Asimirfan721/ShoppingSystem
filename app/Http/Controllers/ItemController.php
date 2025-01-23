<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Electronics;
use App\Models\clothes;
use App\Models\Jeans;
use App\Models\Shirts;
use App\Models\Watches;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'category' => 'required|string',
        ]);

        // Handle the image upload if exists
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Save the data into the appropriate table based on the category
        switch ($request->category) {
            case 'electronics':
                Electronics::create($data);
                break;
            case 'clothes':
                Clothes::create($data);
                break;
            case 'jeans':
                Jeans::create($data);
                break;
            case 'shirts':
                Shirts::create($data);
                break;
            case 'watches':
                Watches::create($data);
                break;
            default:
                return redirect()->back()->with('error', 'Invalid category selected');
        }

        return redirect()->route($request->category . '.index')->with('success', 'Item added successfully');
    }
}