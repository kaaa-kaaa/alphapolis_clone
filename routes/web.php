<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mypage\mypageSeriesController;

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

    //========================================
    //              シリーズ関連
    //========================================
    Route::get('/mypage',[mypageSeriesController::class, 'mypage'])->name('mypage');

    //create
    Route::get('/mypage/{member_id}/createSeries',[mypageSeriesController::class, 'showCreatingSeriesPage'])->name('createSeries');
    Route::post('/mypage/{member_id}/createSeries',[mypageSeriesController::class, 'createSeries']);

    //edit
    Route::get('/mypage/{member_id}/editSeries/{series_id}',[mypageSeriesController::class, 'showSeriesEditingPage'])->name('editSeries');
    Route::post('/mypage/{member_id}/editSeries/{series_id}',[mypageSeriesController::class, 'editSeries']);

    //ユーザ情報編集
    Route::get('/mypage/editMember', [mypageSeriesController::class, 'showEditMember']);
    Route::post('/mypage/editMember', [mypageSeriesController::class, 'editMember']);
    Route::get('/mypage/editMember/changePass', [mypageSeriesController::class, 'showChangePass']);
    Route::post('/mypage/editMember/changePass', [mypageSeriesController::class, 'changePass']);
});

require __DIR__.'/auth.php';


Route::get('/mypage/{member_id}/{series_id}/createEpisode', [MypageEpisodeController::class, 'showCreatingEpisodePage'])->middleware('auth');
Route::post('/mypage/{member_id}/{series_id}/createEpisode', [MypageEpisodeController::class, 'createEpisode'])->middleware('auth');
Route::get('/mypage/{member_id}/{series_id}', [MypageEpisodeController::class, 'showEpisodeList'])->middleware('auth');
Route::get('/mypage/{member_id}/editEpisode/{episode_id}', [MypageEpisodeController::class, 'showEpisodeEditingPage'])->middleware('auth');
Route::post('/mypage/{member_id}/editEpisode/{episode_id}', [MypageEpisodeController::class, 'editEpisode'])->middleware('auth');
Route::post('/mypage/{member_id}/editEpisode/{episode_id}/confirm', [MypageEpisodeController::class, 'deleteConfirm'])->middleware('auth');
Route::post('/mypage/{member_id}/editEpisode/{episode_id}/delete', [MypageEpisodeController::class, 'deleteEpisode'])->middleware('auth');


Route::get('/index', [AlphaController::class, 'index'])->name('index');
Route::get('/read/{series_id}', [AlphaController::class, 'readSeries']);
Route::get('/read/{series_id}/{episode_id}', [AlphaController::class, 'readEpisodes']);
Route::get('/search', [AlphaController::class, 'showSearchingPage']);
Route::post('/search', [AlphaController::class, 'search']);
Route::get('/notfound', [AlphaController::class, 'notFoundS']);
Route::get('/index/{member_id}', [AlphaController::class, 'memberSeries']);
