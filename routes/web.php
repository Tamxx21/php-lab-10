<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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

Route::get('/', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'login']);



Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/page1', [UserController::class, 'page1']);
Route::post("/logout", [UserController::class, "logout"]);