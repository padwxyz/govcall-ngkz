<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DistrictController::class, 'index'])->name('landing-page');
Route::get('/district-result/{id}', [DistrictController::class, 'show'])->name('result');
Route::get('/detail-information/{id}', [ContactController::class, 'show'])->name('detail-information');
Route::get('/search-result', [ContactController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
});

Route::get('/master-data', function () {
    return view('pages.admin.master_data');
});
