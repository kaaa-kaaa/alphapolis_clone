<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypage\mypageSeriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //========================================
    //              シリーズ関連
    //========================================
    Route::get('/mypage',[mypageSeriesController::class, 'mypage'])->name('mypage');
    Route::get('/mypage/{member_id}/createSeries',[mypageSeriesController::class, 'createSeries'])->name('createSeries');
    Route::get('/mypage/{member_id}/editSeries/{series_id}',[mypageSeriesController::class, 'editSeries'])->name('editSeries');
});

require __DIR__.'/auth.php';
