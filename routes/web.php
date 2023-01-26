<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoffController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('tipoff/create', [TipoffController::class, 'create']);
Route::get('gettipoffs', [TipoffController::class, 'index']);
Route::post('addshare', [TipoffController::class, 'addshare']);
Route::post('addlike', [TipoffController::class, 'addlike']);

//comments
Route::post('addcomment', [CommentController::class, 'create']);
Route::post('addcommentshare', [CommentController::class, 'addshare']);
Route::post('addcommentlike', [CommentController::class, 'addlike']);
