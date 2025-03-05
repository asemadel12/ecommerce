<?php

use App\Http\Controllers\Api\Admin\CategoryController as AdminCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::put('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->name('update_category');
Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'delete']);
