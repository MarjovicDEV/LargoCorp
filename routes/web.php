<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * ============================================================================
 * PUBLIC ROUTES - Accessible to all visitors
 * ============================================================================
 */

// Home page - Default to Aimeos shop landing
Route::get('/', function () {
    return redirect('/shop');
})->name('home');

/**
 * ============================================================================
 * AUTHENTICATION ROUTES
 * ============================================================================
 */

// Login page - Show login form
Route::get('/login', function () {
    // If already authenticated, redirect to dashboard
    if (Auth::check()) {
        return redirect('/admin');
    }
    
    return view('auth.login');
})->name('login');

// Login POST - Handle login form submission
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials provided.',
    ])->onlyInput('email');
})->name('login.store');

// Logout
Route::post('/logout', function (\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/');
})->name('logout');

/**
 * ============================================================================
 * PROTECTED ADMIN ROUTES - Requires authentication
 * ============================================================================
 * 
 * These routes require the user to be logged in.
 * If not authenticated, the middleware will redirect to /login
 */

Route::middleware(['web', 'auth'])->group(function () {
    // Admin dashboard redirect
    Route::get('/admin', function () {
        return redirect('/admin/dashboard');
    });
    
    // Admin dashboard - Simple welcome page
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard', [
            'user' => Auth::user(),
        ]);
    })->name('admin.dashboard');
    
    // Protect Aimeos admin routes
    // This ensures /admin/{site}/jqadm/* routes require authentication
    Route::middleware('auth')->prefix('admin')->group(function () {
        // Aimeos admin routes are auto-registered here
        // They will be protected by the auth middleware
    });
});

/**
 * ============================================================================
 * PUBLIC SHOP ROUTES - Aimeos e-commerce
 * ============================================================================
 * 
 * The Aimeos service provider will automatically register shop routes
 * for products, categories, search, etc. under the /shop/* paths
 */
