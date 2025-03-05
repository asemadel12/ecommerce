<?php

namespace App\Services;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Item;
use COM;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsUnprocessable;

class CategoryService
{
    public function create($request)
    {
        try {
            DB::beginTransaction();
            Category::create(['name' => $request->input('category_name')]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
    }
    public function update(CategoryRequest $request, Category $category)
    {
        if (!$category)
            return response()->json(['errors' => 'Category not found'], 404);
        try {
            DB::beginTransaction();
            $category->update([
                'name' => $request->category_name
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        return response()->json(['success' => 'Category updated successfully !']);
    }
    public function delete(Category $category)
    {
        if (!$category)
            return response()->json(['errors' => 'Category not found'], 404);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
        return response()->json(['success' => 'Category deleted successfully !']);
    }
    public function getAllCategories()
    {
        return Category::orderBy('id', 'asc')->get();
    }
}
