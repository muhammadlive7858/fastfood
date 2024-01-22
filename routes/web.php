<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderFoodController;



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
// dashboard
Route::get('/dashboard', function () {
    return view('tables');
})->middleware(['auth', 'verified'])->name('dashboard');

//resourse
Route::resource('food', FoodsController::class)->names('food');
Route::resource('chef', ChefsController::class)->names('chef');
Route::resource('table', TablesController::class)->names('table');
Route::resource('category', CategoryController::class)->names('category');

//service
Route::get('service',[ServiceController::class,'index'])->name('service.index');
Route::get('service/create/{id}',[ServiceController::class,'create'])->name('service.create');
Route::post('service/create/order',[ServiceController::class,'store'])->name('service.create.order');
Route::get('service/show/order/{id}',[ServiceController::class,'show'])->name('service.show.order');
Route::get('service/edit/order/',[ServiceController::class,'edit'])->name('service.edit.order');
Route::post('service/update/order/',[ServiceController::class,'update'])->name('service.update.order');
Route::get('service/delete/food/',[ServiceController::class,'delete_one'])->name('service.delete.food');
Route::get('service/order/destroy/{table}',[ServiceController::class,'destroy'])->name('service.order.destroy');
Route::get('service/order/plus/{table}',[ServiceController::class,'plus'])->name('service.order.plus');
Route::post('service/order/plussession',[ServiceController::class,'session_plus'])->name('service.order.plussession');
// Order
Route::get('order/create/{table}',[OrdersController::class,'store'])->name('order.create');






























// auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
