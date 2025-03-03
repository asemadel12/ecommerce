<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Item;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function create(Request $request)
    {
        $validationData = $request->validate([
            'category_name' => 'required|string|max:255|min:3'
        ], [
            'category_name.required' => 'The category name is required',
            'category_name.min' => 'The category name length must be at least 3'
        ]);
        Category::create(['name' => $validationData['category_name']]);
    }
    public function getAllCategories()
    {
        return Category::orderBy('id', 'asc')->get();
    }
}
