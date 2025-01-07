<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasterDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DistrictController::class, 'index'])->name('landing-page');
Route::get('/district-result/{id}', [DistrictController::class, 'show'])->name('result');
Route::get('/detail-information/{id}', [ContactController::class, 'show'])->name('detail-information');
Route::get('/search-result', [ContactController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
});

Route::get('/master-data', [MasterDataController::class, 'index'])->name('master-data.index');
Route::get('/master-data/create', [MasterDataController::class, 'create'])->name('master-data.create');
Route::post('/master-data', [MasterDataController::class, 'store'])->name('master-data.store');
Route::get('/master-data/{id}', [MasterDataController::class, 'show'])->name('master-data.show');
Route::get('/master-data/{id}/edit', [MasterDataController::class, 'edit'])->name('master-data.edit');
Route::put('/master-data/{id}', [MasterDataController::class, 'update'])->name('master-data.update');
Route::delete('/master-data/{id}', [MasterDataController::class, 'destroy'])->name('master-data.destroy');
