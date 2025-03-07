<?php


namespace App\Services;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ItemService
{
    public function create($request)
    {
        try {
            DB::beginTransaction();
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('items', 'public'); // Store in storage/app/public/items
                // php artisan storage:link
            }
            $item = Item::create([
                'name' => $request->input('product_name'),
                'description' => $request->input('product_description'),
                'category_id' => $request->input('category'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
                'image' => $imagePath
            ]);
            DB::commit();
            return $item;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error creating item: ' . $th->getMessage());
            return false;
        }
    }
    public function getAllItems()
    {
        return Item::join("categories", "categories.id", "=", "items.category_id")
            ->select("items.*", "categories.name as category_name")
            ->orderBy("items.id", "asc")
            ->get();
    }
}
