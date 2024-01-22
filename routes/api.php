<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bot_controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// user check
Route::get('user/check/{chatid}',[bot_controller::class,'check']);
// create bot user
Route::post('create/user',[bot_controller::class,'create_bot_user']);
//get location 
Route::get('get/location',[bot_controller::class,'get_location']);
//get foods 
Route::get('get/foods',[bot_controller::class,'get_food']);
// create order
Route::post('create/order',[bot_controller::class,'create_order']);
