<?php

use App\Http\Controllers\Admin\Item\ItemContoller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
////////////// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');


///////////// Items Page
Route::get('/admin/items/', [ItemContoller::class, 'index'])->name('add_item');