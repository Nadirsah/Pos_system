<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\Esasinfo;
use App\Http\Controllers\Back\Fotolar;
use App\Http\Controllers\Back\HomeHeader;
use App\Http\Controllers\Back\InfoController;
use App\Http\Controllers\Back\Linkler;
use App\Http\Controllers\Back\Naxcivan;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Back\Qarabag;
use App\Http\Controllers\Back\Qezet;
use App\Http\Controllers\Back\Xeberler;
use App\Http\Controllers\Back\Xronika;
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
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerstore'])->name('register.store');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/panel', [Dashboard::class, 'index'])->name('panel');
    Route::resource('/page', PageController::class);
    Route::get('/deletepage/{id}', [PageController::class, 'delete'])->name('delete.page');
    Route::resource('/info', InfoController::class);
    Route::get('/deleteinfo/{id}', [InfoController::class, 'delete'])->name('delete.info');
    Route::resource('/header', HomeHeader::class);
    Route::get('/deleteheader/{id}', [HomeHeader::class, 'delete'])->name('delete.header');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    // Basliq melumatlar
    Route::resource('/esasinfo', Esasinfo::class);
    Route::get('/deleteesasinfo/{id}', [Esasinfo::class, 'delete'])->name('delete.esas');
    // Basliq melumatlar
    Route::resource('/fotolar', Fotolar::class);
    Route::get('/deletefoto/{id}', [Fotolar::class, 'delete'])->name('delete.fotolar');
    // Basliq melumatlar
    Route::resource('/linkler', Linkler::class);
    Route::get('/deletelink/{id}', [Linkler::class, 'delete'])->name('delete.linkler');
    // Basliq melumatlar
    Route::resource('/naxcivan', Naxcivan::class);
    Route::get('/deletenaxcivan/{id}', [Naxcivan::class, 'delete'])->name('delete.naxcivan');
    // Basliq melumatlar
    Route::resource('/qarabag', Qarabag::class);
    Route::get('/deleteqarabag/{id}', [Qarabag::class, 'delete'])->name('delete.qarabag');
    // Basliq melumatlar
    Route::resource('/qezet', Qezet::class);
    Route::get('/deleteqezet/{id}', [Qezet::class, 'delete'])->name('delete.qezet');
    // Basliq melumatlar
    Route::resource('/xeberler', Xeberler::class);
    Route::get('/deletexeber/{id}', [Xeberler::class, 'delete'])->name('delete.xeberler');
    // Basliq melumatlar
    Route::resource('/xronika', Xronika::class);
    Route::get('/deletexronika/{id}', [Xronika::class, 'delete'])->name('delete.xronika');
});

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/tarix', [FrontController::class, 'tarix'])->name('tarix');
Route::get('/tebiet', [FrontController::class, 'tebiet'])->name('tebiet');
Route::get('/sehiyye', [FrontController::class, 'sehiyye'])->name('sehiyye');
Route::get('/iqtisadiyyat', [FrontController::class, 'iqtisadiyyat'])->name('iqtisadiyyat');
Route::get('/medeniyyet', [FrontController::class, 'medeniyyet'])->name('medeniyyet');
Route::get('/elm_tehsil', [FrontController::class, 'elm_tehsil'])->name('elm_tehsil');
Route::get('/news/{id}', [FrontController::class, 'news'])->name('news');
Route::get('/{pages}', [FrontController::class, 'page'])->name('test');