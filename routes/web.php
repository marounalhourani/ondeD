<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageCarouselController;
use App\Http\Controllers\AuthController; // Import AuthController
use App\Models\ImageCarousel;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BoardGameController;
use App\Http\Controllers\ScheduleController;

use App\Models\BgCategory;
use App\Models\BoardGame;
use App\Models\Event;
use App\Models\Date;


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

        // Schedule Admin routes
        Route::prefix('/admin/schedule')->group(function () {
            Route::get('/', [ScheduleController::class, 'index'])->name('index');
            Route::get('/add-date', [ScheduleController::class,'createDate'])->name('dates.create');
            Route::post('/store-date', [ScheduleController::class,'storeDate'])->name('dates.store');
            Route::get('/all-date',[ScheduleController::class,'allDates'])->name('dates.index');
            Route::delete('/dates/{id}', [ScheduleController::class, 'deleteDate'])->name('dates.destroy');
            Route::get('/edit-date/{id}', [ScheduleController::class, 'editDate'])->name('dates.edit');
            Route::put('/update-date/{id}', [ScheduleController::class, 'updateDate'])->name('dates.update');
            Route::get('/create-event', [ScheduleController::class, 'createEvent'])->name('events.create');
            Route::post('/store-event', [ScheduleController::class, 'storeEvent'])->name('events.store');
            Route::get('/events/{id}', [ScheduleController::class, 'showEvent'])->name('events.show');
            Route::get('/events/{id}/edit', [ScheduleController::class, 'editEvent'])->name('events.edit');
            Route::delete('/events/{id}', [ScheduleController::class, 'deleteEvent'])->name('events.destroy');
            Route::put('/events/{id}', [ScheduleController::class, 'updateEvent'])->name('events.update');
    
        });

    Route::prefix('/admin/menu')->group(function () {
        Route::get('/', [MenuController::class, 'index']); // Show all menu items
        Route::get('/create-cat', [MenuController::class, 'createCategory']); // Show form to create category
        Route::post('/store-cat',[MenuController::class, 'storeCategory']); //store category
        Route::get('/allcategories',[MenuController::class,'showAllCategories']); //show all categories
        Route::get('/allcategories/{id}',[MenuController::class,'showCategory']); //show all categories
        Route::delete('/delete-category/{id}', [MenuController::class, 'deleteCategory']);//delete cat
        Route::put('/update-category/{id}', [MenuController::class, 'updateCategory']);//update cat
        Route::get('/create-item',[MenuController::class, 'createItem']);//create Item
        Route::post('/store-item', [MenuController::class, 'storeItem']);//store item
        Route::get('/{id}',[MenuController::class, 'showItem']);//show details for 1 item
        Route::delete('/delete-item/{id}',[MenuController::class, 'deleteItem']); //delete item
        Route::put('/update-item/{id}', [MenuController::class, 'updateItem']); //update
    
        });
        

    Route::prefix('/admin/boardgamemanager')->group(function () {
        Route::get('/', [BoardGameController::class, 'index']); // Show all menu items
        Route::get('/categories', [BoardGameController::class, 'showCategories']); // Show all menu items
        Route::delete('categories/{id}/delete', [BoardGameController::class, 'deleteCategory']);
        Route::get('/categories/{id}/edit',[BoardGameController::class, 'editBgView']);
        Route::put('/categories/{id}', [BoardGameController::class, 'updateCategory']);
        Route::get('/createCat',[BoardGameController::class, 'createCat']);
        Route::post('/categories', [BoardGameController::class, 'storeCategory']);
        Route::get('createBoardGame',[BoardGameController::class, 'createBoardGame']);
        Route::post('/boardgames', [BoardGameController::class, 'storeBoardGame']);
        Route::get('/boardgames/{id}/edit', [BoardGameController::class, 'editBoardGameView']);
        Route::delete('/boardgames/{id}', [BoardGameController::class, 'deleteBoardGame']);
        Route::put('/boardgames/{id}', [BoardGameController::class, 'updateBoardGame']);
    
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









Route::get('/schedule', function () {
    $dates = Date::with('events')->get();
    
    $datesByEvent = [];

    foreach ($dates as $date) {
        $datesByEvent[$date->name] = $date->events->pluck('name')->toArray();
    }

    return view('schedule', ['x' => $datesByEvent]);
});





Route::get('/boardgames', function () {
        // Retrieve categories from the bg_categories table
        $categories = BgCategory::all();
    
        // Prepare an array to hold the categories and games
        $gamesByCategory = [];
    
        foreach ($categories as $category) {
            // Retrieve all board games that belong to this category
            $games = BoardGame::where('bg_category_id', $category->id)->pluck('name');
    
            // Add the category and its games to the array
            $gamesByCategory[$category->name] = $games;
        }
    
        // dd($gamesByCategory);
        // Pass the gamesByCategory to the view
        return view('boardgames', ['x' => $gamesByCategory]);
    });
