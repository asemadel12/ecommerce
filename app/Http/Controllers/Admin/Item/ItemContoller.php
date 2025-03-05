<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
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
        $items = $this->itemService->getAllItems();
        return view('admin.items.add_item', compact('categories', 'items'));
    }
    public function create(ItemRequest $request)
    {
        $item = $this->itemService->create($request);
        if (!$item)
            return redirect()->route('item_page')->with(['success' => "The item could not be added, something wrong"]);

        return redirect()->route('item_page')->with(['success' => "The item added successfully !"]);
    }
}
