<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'showLogin'])->name('login');

Route::post('/', [PageController::class, 'handleLogin'])->name('login.handle');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
