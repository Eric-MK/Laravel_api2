<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\dummyAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();//useed for Outh authorization
});


Route::get('data', [dummyAPI::class, 'getData']);

//Route::get('list',[DeviceController::class, 'list']);

Route::get('list/{id}',[DeviceController::class, 'list']);//getting data from id

