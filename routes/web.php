<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Default route
Route::get('/', function () {
    return view('auth.signin');
});

// Route for the login page handled by LoginController
Route::get('/signin', [LoginController::class, 'showLoginForm'])->name('signin');

// Route to handle login form submission
Route::post('/signin', [LoginController::class, 'login'])->name('login');

// Route for the signup page
Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Protected route for the dashboard page (requires user to be logged in)
Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

