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
    public function update($request, $item)
    {
        if (!$item)
            return response()->json(['errors' => 'The item is not defiend'], 404);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public'); // Store in storage/app/public/items
            // php artisan storage:link
        }
        try {
            DB::beginTransaction();
            $item->update([
                'name' => $request->product_name,
                'description' => $request->product_description,
                'category_id' => $request->category,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'image' => $imagePath,
            ]);
            DB::commit();
            return response()->json(['success' => 'Item updated successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Error updating item: ' . $th->getMessage());
            return response()->json(['errors' => 'Update failed. Please try again later.'], 500);
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
