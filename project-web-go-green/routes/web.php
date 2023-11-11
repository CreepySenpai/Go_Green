<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Livewire\AddProductComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//Group Route In Folder Admin
Route::group(['namespace' => 'Admin'], function() {
    // If user press login we check if user was logged
    Route::group(['prefix' => 'login', 'middleware' => 'CheckLoggedIn'], function() {
        Route::get('/', [LoginController::class, 'getLogin']);
        Route::post('/', [LoginController::class, 'postLogin']);
    });

    Route::get('/logout', [HomeController::class, 'getLogout']);

    // Check if guest try to go home page with out loggin
    Route::group(['prefix' => 'admin', 'middleware' => 'CheckLoggedOut'], function(){
        Route::get('/home', [HomeController::class, 'getHome']);

        Route::group(['prefix' => 'category'], function(){
            Route::get('/', [CategoryController::class, 'getCategory']);
            Route::post('/', [CategoryController::class, 'postCategory']);

            Route::get('/edit/{id}', [CategoryController::class, 'getEditCategory']);
            Route::post('/edit/{id}', [CategoryController::class, 'postEditCategory']);

            Route::get('/delete/{id}', [CategoryController::class, 'getDeleteCategory']);
        });
    });


});

//Group Route In Folder Customer
Route::get('/', [FrontController::class, 'index'])->name('front.shop');
