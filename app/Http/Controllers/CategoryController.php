<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->name,
            // Add other fields if needed
        ]);

        // Redirect back or to a specific page
        return redirect()->back()->with('message', 'Category added successfully');
    }
}

