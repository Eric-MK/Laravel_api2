<?php

use Illuminate\Http\Request;
use App\Http\Controllers\dummyAPI;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MemberController;

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

Route::get('list/{id?}',[DeviceController::class, 'list']);//making the id optional

Route::post('add', [DeviceController::class, 'add']);
Route::put('update', [DeviceController::class, 'update']);
Route::get('search/{name}', [DeviceController::class,'search']);
Route::delete('delete/{id}', [DeviceController::class,'delete']);
Route::post('save', [DeviceController::class,'testData']);

route::apiResource("member",MemberController::class);//saves time
//Route::apiResource() is a method provided by Laravel for defining routes that will interact with a resource controller.


/* Laravel will automatically generate the following URLs:

GET      members            => MemberController@index
POST     /members            => MemberController@store
GET      /members/{member}   => MemberController@show
PUT      /members/{member}   => MemberController@update
DELETE   /members/{member}   => MemberController@destroy
 */
