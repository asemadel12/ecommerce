<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }
    public function update(ItemRequest $request, Item $item)
    {
        return $this->itemService->update($request, $item);
    }
}
