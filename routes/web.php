<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Stub login route - required by Aimeos AdminController redirects
Route::get('/login', function () {
    abort(401, 'Unauthorized. Please configure authentication.');
})->name('login');
