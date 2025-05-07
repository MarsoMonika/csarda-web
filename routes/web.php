<?php

use App\Http\Controllers\MenuController;
use App\Http\Middleware\SetLocale;

use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', fn () => view('home'));
    Route::get('/etlap', [MenuController::class, 'index'])->name('menu');
});
