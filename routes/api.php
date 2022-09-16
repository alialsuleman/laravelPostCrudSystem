<?php

use App\Http\Controllers\Posts;
use App\Models\Post ;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// return all post 
Route::get('/posts',[Posts::class ,'index'] );

//return order post 
Route::get('/orderposts/{order}',[Posts::class ,'indexOrd'] );

// search posts by name 
Route::get('/search/{name}',[Posts::class ,'search'] );

// create post 
Route::post('/posts',[Posts::class,'create']) ;

// update post 
Route::put('/posts/{post}',[Posts::class,'update']); 

//update post by name 
Route::post('/posts/{name}',[Posts::class,'updateByName']); 

//delete post by id 
Route::delete('/posts/{post}',[Posts::class,'delete']);

//delete post by title 
Route::delete('/delposts/{name}',[Posts::class,'deleteName']);

