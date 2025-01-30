<?php

use App\Http\Controllers\JobOfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => to_route('jobOffers.index'));

Route::resource('jobOffers', JobOfferController::class)->only(['index', 'show']);
