<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MypageEpisodeController;

use App\Http\Controllers\AlphaController;


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
});

require __DIR__.'/auth.php';


Route::get('/mypage/{member_id}/{series_id}/createEpisode', [MypageEpisodeController::class, 'showCreatingEpisodePage']);
Route::post('/mypage/{member_id}/{series_id}/createEpisode', [MypageEpisodeController::class, 'createEpisode']);


Route::get('/mypage/{member_id}/{series_id}', [MypageEpisodeController::class, 'showEpisodeList']);

Route::get('/mypage/{member_id}/edit/{episode_id}', [MypageEpisodeController::class, 'showEpisodeEditingPage']);
Route::post('/mypage/{member_id}/edit/{episode_id}', [MypageEpisodeController::class, 'editEpisode']);


Route::get('/index', [AlphaController::class, 'index'])->name('index');
Route::get('/read/{series_id}', [AlphaController::class, 'readSeries']);
Route::get('/read/{series_id}/{episode_id}', [AlphaController::class, 'readEpisodes']);
Route::get('/search', [AlphaController::class, 'showSearchingPage']);
Route::post('/search', [AlphaController::class, 'search']);
Route::get('/notfound', [AlphaController::class, 'notFoundS']);
