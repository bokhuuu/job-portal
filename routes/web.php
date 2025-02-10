<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobOfferController;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('jobOffer.index'));

Route::resource('jobOffer', JobOfferController::class)->only(['index', 'show']);

Route::get('/login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::middleware('auth')->group(function () {
    Route::resource('jobOffer.application', JobApplicationController::class)
        ->only(['create', 'store']);
});
