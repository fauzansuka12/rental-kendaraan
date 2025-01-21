<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterControllers;
use App\Livewire\TransaksiComponent;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

Route::get('/',[HomeController::class,'index'])->name('home')->middleware('auth');
 
Route::get('register',[RegisterControllers::class,'index'])->name('register');
Route::post('register',[RegisterControllers::class,'store'])->name('register.store');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class,'proses'])->name('login.proses');
Route::get('login/keluar',[LoginController::class,'keluar'])->name('login.keluar');

Route::get('users',function(){
return view('users.index');
})->name('users')->middleware('auth');
Route::get('mobil',function(){
    return view('mobil.index');
})->name('mobil')->middleware('auth');
Route::get('mobil-create',function(){
    return view('mobil.create');
})->name('mobil.create')->middleware('auth');

Route::get('transaksi', function () {
    return view('transaksi.index');
})->name('transaksi')->middleware('auth');

Route::get('laporan', function () {
    return view('laporan.index');
})->name('laporan')->middleware('auth');

Route::get('test',function(){
return view ('laporan.exportpdf');
});

use App\Http\Controllers\LaporanController;
use App\Livewire\LaporanComponent;

Route::middleware(['auth', 'pemilik'])->group(function () {
    Route::get('laporancomponent', [LaporanComponent::class, 'laporancomponent'])->name('laporan-component');
});
