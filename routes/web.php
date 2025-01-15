<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCarouselController;
use App\Http\Controllers\AuthController; // Import AuthController
use App\Models\ImageCarousel;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('welcome', ['carouselImages' => ImageCarousel::orderBy('priority', 'asc')->get()]);
});


Route::get('/activity', function () {
    return view('activities');
});


Route::get('/splash', function () {
    return view('splash');
})->name('splash');



Route::get('/menu/{slug}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/menu', function () {
    return view('menu.menu',  [MenuController::class, 'show']);
});




// Login routes
Route::get('/admin/login', function () {
    return view('admin.login'); // Display login form
})->name('login.form');

// Handle login

Route::post('/admin/login', [AuthController::class, 'login'])->name('login');

// Apply 'auth' middleware to all routes (this will protect routes that require login)
Route::middleware(['auth'])->group(function () {


    // Admin Dashboard route
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    // Carousel Image routes
    Route::prefix('/admin/carousel-image')->group(function () {
        Route::get('/', [ImageCarouselController::class, 'index']); // Show all images
        Route::get('/create', [ImageCarouselController::class, 'create']); // Show create form
        Route::post('/', [ImageCarouselController::class, 'store']); // Handle form submission
        Route::get('/edit/{img}', [ImageCarouselController::class, 'edit']); // Show a single image
        Route::put('/{id}', [ImageCarouselController::class, 'update']);
        Route::get('/{img}', [ImageCarouselController::class, 'show']); // Show a single image
        Route::delete('/{imageCarousel}', [ImageCarouselController::class, 'destroy']); // Delete an image
    });
    
    // Logout route (optional: use a POST request to logout)
    Route::post('/admin/logout', function () {
        Auth::logout(); // Logout the user
        return redirect()->route('login.form'); // Redirect to login form after logout
    })->name('logout');
});

