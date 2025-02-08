<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterControllers;
use App\Http\Controllers\TransaksiController;
use App\Models\Mobil;
use Illuminate\Support\Facades\Route;

Route::get('/admin',[HomeController::class,'index'])->name('home')->middleware('role:admin');
 
Route::get('register',[RegisterControllers::class,'index'])->name('register');
Route::post('register',[RegisterControllers::class,'store'])->name('register.store');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class,'proses'])->name('login.proses');
Route::get('login/keluar',[LoginController::class,'keluar'])->name('login.keluar');

Route::get('/',[FrontController::class,'index'])->name('front.index');

Route::get('/details/{mobil:slug}', [FrontController::class, 'details'])->name('front.details');



Route::middleware('auth')->group(function ()  {
    
    
    Route::get('/checkout/{mobil:slug}',[FrontController::class,'checkout'])->name('checkout')->middleware('role:pelanggan');

    Route::post('/checkout/{mobil}',[FrontController::class,'storeCheckout'])->name('storeCheckout')->middleware('role:pelanggan');
    

    Route::patch('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');


    Route::get('/profile',[FrontController::class,'profile'])->name('front.profile');
    Route::get('/profile/proses',[FrontController::class,'proses'])->name('front.proses');

    Route::get('users',function(){
    return view('users.index');

    })->name('users')->middleware('role:admin');
    Route::get('mobil',function(){
        return view('mobil.index');
    })->name('mobil')->middleware('role:admin');
    Route::get('mobil-create',function(){
        return view('mobil.create');
    })->name('mobil.create')->middleware('role:admin');

    Route::get('transaksi', function () {
        return view('transaksi.index');
    })->name('transaksi')->middleware('role:admin');

    Route::get('laporan', function () {
        return view('laporan.index');
    })->name('laporan')->middleware('role:admin');

    Route::get('test',function(){
    return view ('laporan.exportpdf');
});
});

use App\Http\Controllers\LaporanController;
use App\Livewire\LaporanComponent;

Route::middleware(['auth'])->group(function () {
    Route::get('laporancomponent', [LaporanComponent::class, 'laporancomponent'])->name('laporan-component');
});
