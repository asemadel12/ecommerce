<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemContoller extends Controller
{
    protected $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function index()
    {
        return view('admin/items/add_item');
    }
    public function create(Request $request)
    {
        $this->itemService->create($request);
    }
}
