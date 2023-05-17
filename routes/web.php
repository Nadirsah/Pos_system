<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Ayarlar;
use App\Http\Controllers\Back\Dashboard;
use App\Http\Controllers\Back\Hesabat;
use App\Http\Controllers\Back\Kategoriya;
use App\Http\Controllers\Back\Masa;
use App\Http\Controllers\Back\Mehsul;
use App\Http\Controllers\Back\Order;
use App\Http\Controllers\Back\Priint;
use App\Http\Controllers\Back\Profile;
use App\Http\Controllers\Back\Excel;
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
    // Masa melumatlar
    Route::resource('/masa', Masa::class)->middleware('isRole');
    Route::get('/deletemasa/{id}', [Masa::class, 'delete'])->name('delete.masa');
    Route::get('/masa/siralama', [Masa::class, 'orders'])->name('masa.orders');
    // Kategoriya melumatlar
    Route::resource('/kategoriya', Kategoriya::class)->middleware('isRole');
    Route::get('/deletekategoriya/{id}', [Kategoriya::class, 'delete'])->name('delete.kategoriya');
    // Mehsul melumatlar
    Route::resource('/mehsul', Mehsul::class)->middleware('isRole');
    Route::get('/deletemehsul/{id}', [Mehsul::class, 'delete'])->name('delete.mehsul');
    // Hesabat melumatlar
    Route::resource('/hesabat', Hesabat::class)->middleware('isRole');
    Route::post('/date', [Hesabat::class, 'filter'])->name('date');
    Route::get('/zet', [Hesabat::class, 'zet'])->name('zet')->middleware('isRole');
    Route::post('/zetdate', [Hesabat::class, 'zetfilter'])->name('zetdate');
    //Ayarlar
    Route::resource('/ayarlar', Ayarlar::class)->middleware('isRole');
    Route::get('/deleteayarlar/{id}', [Ayarlar::class, 'delete'])->name('delete.ayarlar');
    // Profil melumatlar
    Route::resource('/profile', Profile::class)->middleware('isRole');
    Route::get('/deleteprofile/{id}', [Profile::class, 'delete'])->name('delete.profile');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    // Sifaris melumatlar
    Route::resource('/order', Order::class);
    Route::post('printorder', [Order::class, 'print'])->name('printorder');
    Route::post('/getmehsul', [Dashboard::class, 'getmehsul'])->name('getmehsul');
    Route::post('/getqiymet', [Dashboard::class, 'getqiymet'])->name('getqiymet');
    // Activ sifaris melumatlar
    Route::get('/show', [Dashboard::class, 'getOrder'])->name('ordershow');
    // Activ sifaris melumatlar cedveli
    Route::get('/showcedvel', [Dashboard::class, 'getOrderCedvel'])->name('ordershowcedvel');
    // sifaris capi
    Route::get('/showorderprint', [Dashboard::class, 'getOrderPrint'])->name('ordershowprint');
    // print
    Route::get('/print/{id}', [Priint::class, 'index']);
    // Activ sifarislerin yenilenmesi
    Route::post('/geteditqiymet', [Dashboard::class, 'geteditqiymet'])->name('geteditqiymet');
    Route::post('/geteditmehsul', [Dashboard::class, 'geteditmehsul'])->name('geteditmehsul');

     //Excel
     Route::get('/excel',[Excel::class,'index'])->name('excel');
     Route::get('users-export', [Profile::class, 'export'])->name('users.export');
     Route::post('users-import', [Profile::class, 'import'])->name('users.import');
     Route::get('hesabat-export', [Hesabat::class, 'export'])->name('hesabat.export');

     
});

