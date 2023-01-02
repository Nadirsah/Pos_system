<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\InfoController;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

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
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'store'])->name('login.store');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerstore'])->name('register.store');
    Route::get('/panel', [Dashboard::class, 'index'])->name('panel');
    Route::resource('/page', PageController::class);
    Route::get('/deletepage/{id}', [PageController::class, 'delete'])->name('delete.page');
    Route::resource('/info', InfoController::class);
    Route::get('/deleteinfo/{id}', [InfoController::class, 'delete'])->name('delete.info');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/tarix', [FrontController::class, 'tarix'])->name('tarix');
Route::get('/tebiet', [FrontController::class, 'tebiet'])->name('tebiet');
Route::get('/sehiyye', [FrontController::class, 'sehiyye'])->name('sehiyye');
Route::get('/iqtisadiyyat', [FrontController::class, 'iqtisadiyyat'])->name('iqtisadiyyat');
Route::get('/medeniyyet', [FrontController::class, 'medeniyyet'])->name('medeniyyet');
Route::get('/elm_tehsil', [FrontController::class, 'elm_tehsil'])->name('elm_tehsil');
Route::get('/news/{id}', [FrontController::class, 'news'])->name('news');

