<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\AuthController;

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
Route::prefix("admin")->name('admin.')->middleware("isLogin")->group(function(){
    Route::get('/login',[AuthController::class,"index"])->name('login');
    Route::post('/auth',[AuthController::class,"store"])->name('login.store');
});

Route::prefix("admin")->name('admin.')->middleware("isAdmin")->group(function(){
    Route::get('/panel',[Dashboard::class,"index"])->name('panel');
    Route::get('/logout',[AuthController::class,"destroy"])->name('logout');
});





// Route::get('/', function () {
//     return view('welcome');
// });
