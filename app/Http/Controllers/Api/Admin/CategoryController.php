<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function update(CategoryRequest $request, Category $category)
    {
        return $this->categoryService->update($request, $category);
    }
    public function delete(Category $category)
    {
        return $this->categoryService->delete($category);
    }
    public function getAllCategories()
    {
        $allCategories = $this->categoryService->getAllCategories();

        // Modify each category to include the full image URL
        $allCategories = collect($allCategories)->map(function ($category) {
            $category['image_url'] = asset('storage/' . $category['image']); // Generates full URL
            return $category;
        });
        
        return response()->json([
            'success' => true,
            'categories' => $allCategories
        ], 200);
    }
}
