<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.categories.add_category', compact('categories'));
    }
    public function create(CategoryRequest $request)
    {
        $this->categoryService->create($request);
        return redirect()->route('category_page')->with('success', 'The category added successfully!');
    }
}
