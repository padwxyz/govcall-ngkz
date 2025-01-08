<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

Route::get('/login-admin', [AdminController::class, 'index'])->name('login-admin');
Route::post('/login-admin', [AdminController::class, 'authenticate']);

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/', [DistrictController::class, 'index'])->name('landing-page');
Route::get('/district-result/{id}', [DistrictController::class, 'show'])->name('result');
Route::get('/detail-information/{id}', [ContactController::class, 'show'])->name('detail-information');
Route::get('/search-result', [ContactController::class, 'search'])->name('search');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin-dashboard');
    Route::get('/master-data', [MasterDataController::class, 'index'])->name('master-data.index');
    Route::get('/master-data/create', [MasterDataController::class, 'create'])->name('master-data.create');
    Route::get('/get-sub-districts', [MasterDataController::class, 'getSubDistricts'])->name('get.subdistricts');
    Route::post('/master-data', [MasterDataController::class, 'store'])->name('master-data.store');
    Route::get('/master-data/{id}', [MasterDataController::class, 'show'])->name('master-data.show');
    Route::get('/master-data/{id}/edit', [MasterDataController::class, 'edit'])->name('master-data.edit');
    Route::put('/master-data/{id}', [MasterDataController::class, 'update'])->name('master-data.update');
    Route::delete('/master-data/{id}', [MasterDataController::class, 'destroy'])->name('master-data.destroy');
});
