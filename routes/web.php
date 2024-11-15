<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/myorder',[HomeController::class,'myorder'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//=====================>Product curd<======================//
Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
Route::get('view_categoty',[AdminController::class,'view_categoty'])->middleware(['auth','admin']);
Route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
Route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
Route::get('add_producte',[AdminController::class,'add_product'])->middleware(['auth','admin']);
Route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
Route::get('view_producte',[AdminController::class,'view_producte'])->middleware(['auth','admin']);
Route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);
Route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);
Route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);
Route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);


//=====================>Product userFace<======================//

Route::get('product_detailse/{id}',[HomeController::class,'product_details']);
Route::get('shopes',[HomeController::class,'shopes']);
Route::get('why',[HomeController::class,'why']);
Route::get('testimonial',[HomeController::class,'testimonial']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::controller(HomeController::class)->group(function(){
Route::get('stripe/{value}', 'stripe');
Route::post('stripe/{value}', 'stripePost')->name('stripe.post');});
Route::post('confirm_ordere',[HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);
Route::get('view_orders',[AdminController::class,'view_order'])->middleware(['auth','admin']);
Route::get('on_the_waye/{id}',[AdminController::class,'on_the_way'])->middleware(['auth','admin']);
Route::get('deliverede/{id}',[AdminController::class,'delivered'])->middleware(['auth','admin']);
Route::get('print/{id}',[AdminController::class,'print'])->middleware(['auth','admin']);

