<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('jobOffer.index'));

Route::resource('jobOffer', JobOfferController::class)->only(['index', 'show']);

Route::get('/login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::middleware('auth')->group(
    function () {
        Route::resource('jobOffer.application', JobApplicationController::class)
            ->only(['create', 'store']);

        Route::resource('my-job-applications', MyJobApplicationController::class)
            ->only(['index', 'destroy']);

        Route::resource('employer', EmployerController::class)
            ->only(['create', 'store']);

        Route::middleware('employer')
            ->resource('my_jobs', MyJobController::class);
    }
);

Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
