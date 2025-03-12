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
        $imagePath = '';
        if ($request->hasFile('image'))
            $imagePath = $request->file('image')->store('categories', 'public'); // Store in storage/app/public/categories
        try {
            DB::beginTransaction();
            Category::create([
                'name' => $request->input('category_name'),
                'image' => $imagePath
            ]);
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
        $imagePath = '';
        if ($request->hasFile('image'))
            $imagePath = $request->file('image')->store('categories', 'public');
        try {
            DB::beginTransaction();
            $category->update([
                'name' => $request->category_name,
                'image' => $imagePath
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
        if ($category->items()->exists())
            return response()->json(['errors' => 'Cannot delete category. It has linked items.'], 400);
        try {
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            return response()->json(['success' => 'Category deleted successfully !']);
        } catch (\Throwable $th) {
            DB::rollBack();
            //throw $th;
        }
    }
    public function getAllCategories()
    {
        return Category::orderBy('id', 'asc')->get();
    }
}
