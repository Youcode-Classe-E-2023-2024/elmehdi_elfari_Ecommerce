<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

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

/*Route::get('/', function () {
    return view('home');
});*/
Route::get('/',[PostController::class,'show']);

Route::get('/create',[PostController::class,'create']);

Route::post('/create',[PostController::class,'store']);

Route::get('/create/{id}/edit',[PostController::class,'edit']);

Route::put('/create/{id}/edit',[PostController::class,'update']);

Route::delete('/create/{id}/delete', [PostController::class, 'destroy']);
