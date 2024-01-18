<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/add', [App\Http\Controllers\ProductController::class, 'add']);
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit']);
Route::patch('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy']);

//For adding an image
Route::get('/add-image', [\App\Http\Controllers\ImageUploadController::class, 'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image', [\App\Http\Controllers\ImageUploadController::class, 'storeImage'])
    ->name('images.store');

//For showing an image
Route::get('/view-image', [\App\Http\Controllers\ImageUploadController::class, 'viewImage'])->name('images.view');
