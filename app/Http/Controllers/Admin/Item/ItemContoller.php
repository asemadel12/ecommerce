<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemContoller extends Controller
{
    public function index()
    {
        return view('admin/items/add_item');
    }
}
