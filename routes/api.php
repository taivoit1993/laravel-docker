<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Content\PostController;
use App\Http\Controllers\Test\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);
Route::post('users',[UserController::class,'index']);
Route::get('publish', function () {
    // Route logic...

    Redis::publish('test-channel', json_encode(['foo' => 'bar']));
});
Route::middleware('auth:api')->group(function(){
    Route::resource('posts', PostController::class)->middleware('can:isSuperAdmin');
    
});

