<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EcomadminController;
use App\Http\Controllers\SubcatagoriesController;
use App\Http\Controllers\HomeController;

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
    return view('ecommerce.layout.home');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('admin.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/catagory', [EcomadminController::class, 'catagory_add'])->name('catagory_add')->middleware('auth');
    Route::post('/dashboard/catagory/create', [EcomadminController::class, 'catagory_create'])->name('catagory_create')->middleware('auth');
    Route::get('/dashboard/catagory/show', [EcomadminController::class, 'catagory_show'])->name('catagory_show')->middleware('auth');
    Route::get('/dashboard/catagory/edit{id}', [EcomadminController::class, 'catagory_edit'])->name('catagory_edit')->middleware('auth');
    Route::post('/dashboard/catagory/catagory_update{id}', [EcomadminController::class,  'catagory_update'])->name('catagory_update')->middleware('auth');
    Route::get('/dashboard/catagory/delete{id}', [EcomadminController::class, 'catagory_delete'])->name('catagory_delete')->middleware('auth');
    



    Route::get('/dashboard/subcatagory', [SubcatagoriesController::class, 'index'])->name('subcatagory_add')->middleware('auth');
    Route::post('/dashboard/subcatagory/create', [SubcatagoriesController::class, 'subcatagory_create'])->name('subcatagory_create')->middleware('auth');
    Route::post('/dashboard/subcatagory/show', [SubcatagoriesController::class, 'subcatagory_show'])->name('subcatagory_show')->middleware('auth');
    
    Route::get('/dashboard/product', [ProductController::class, 'index'])->name('product_add')->middleware('auth');
    Route::post('/dashboard/product/create', [ProductController::class, 'productcreate'])->name('product_create')->middleware('auth');
    Route::get('/dashboard/product/show', [ProductController::class, 'showProduct'])->name('product_show')->middleware('auth');
    Route::get('/dashboard/product/search', [ProductController::class, 'search'])->name('product_search')->middleware('auth');
    


});

require __DIR__.'/auth.php';
