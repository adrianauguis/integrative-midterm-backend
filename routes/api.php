<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;

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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){

    //User
    Route::get('/user',[AuthController::class, 'user']);
    Route::post('/logout',[AuthController::class, 'logout']);

   // Route::get('/posts',[PostController::class, 'index']); // get all post
   // Route::post('/posts',[PostController::class,'store']); //create post
   // Route::get('/posts/{id}',[PostController::class,'show']); // get single post
   // Route::put('/posts/{id}',[PostController::class,'update']); //update post
   // Route::delete('/posts/{id}',[PostController::class,'destroy']); //delete post
});

// Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
//     return $request->user();
// });

Route::get('/user',[UsersController::class, 'index']);
Route::post('/user',[UsersController::class,'store']);
Route::get('/user/{id}',[UsersController::class,'show']);
Route::put('/user/{id}',[UsersController::class,'update']);
Route::delete('/user/{id}',[UsersController::class,'delete']);

// Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers'], function(){
//     Route::apiResource('users',UsersController::class);
// });
