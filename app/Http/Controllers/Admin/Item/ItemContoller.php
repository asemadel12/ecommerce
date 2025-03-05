<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemContoller extends Controller
{
    protected $itemService;
    protected $categoryService;
    public function __construct(ItemService $itemService, CategoryService $categoryService)
    {
        $this->itemService = $itemService;
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.items.add_item', compact('categories'));
    }
    public function create(Request $request)
    {
        $this->itemService->create($request);
    }
}
