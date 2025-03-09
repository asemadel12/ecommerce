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
        return response()->json([
            'success' => true,
            'categories' => $allCategories
        ], 200);
    }
}
