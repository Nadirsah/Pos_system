<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\Esasinfo;
use App\Http\Controllers\Back\Fotolar;
use App\Http\Controllers\Back\HomeHeader;
use App\Http\Controllers\Back\IndexHeader;
use App\Http\Controllers\Back\InfoController;
use App\Http\Controllers\Back\Linkler;
use App\Http\Controllers\Back\Naxcivan;
use App\Http\Controllers\Back\PageController;
use App\Http\Controllers\Back\Profile;
use App\Http\Controllers\Back\Qarabag;
use App\Http\Controllers\Back\Qezet;
use App\Http\Controllers\Back\Xeberler;
use App\Http\Controllers\Back\Xronika;
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

//
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/auth', [AuthController::class, 'store'])->name('login.store');
    Route::get('/register', [AuthController::class, 'register'])->name('qeydiyyat');
    Route::post('/register', [AuthController::class, 'registerstore'])->name('register.store');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::get('/panel', [Dashboard::class, 'index'])->name('panel');
    // Basliq melumatlar

    Route::resource('/profile', Profile::class);
    Route::get('/deleteprofile/{id}', [Profile::class, 'delete'])->name('delete.profile');
    // Basliq melumatlar
    Route::resource('/page', PageController::class);
    Route::get('/deletepage/{id}', [PageController::class, 'delete'])->name('delete.page');
    Route::get('/page/siralama', [PageController::class, 'orders'])->name('page.orders');
    // Basliq melumatlar
    Route::resource('/info', InfoController::class);
    Route::get('/deleteinfo/{id}', [InfoController::class, 'delete'])->name('delete.info');
    // Basliq melumatlar
    Route::resource('/header', HomeHeader::class);
    Route::get('/deleteheader/{id}', [HomeHeader::class, 'delete'])->name('delete.header');

    //
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
    Route::resource('/slide', Xeberler::class);
    Route::get('/deletexeber/{id}', [Xeberler::class, 'delete'])->name('delete.xeberler');
    // Basliq melumatlar
    Route::resource('/xronika', Xronika::class);
    Route::get('/deletexronika/{id}', [Xronika::class, 'delete'])->name('delete.xronika');
    //indexheader
    Route::resource('/indexheader', IndexHeader::class);
    Route::get('/deleteindexheader/{id}', [IndexHeader::class, 'delete'])->name('delete.indexheader');
});
Route::post('/getmehsul', [Dashboard::class, 'getmehsul']);
Route::post('/getqiymet', [Dashboard::class, 'getqiymet']);
