<?php

use App\Http\Controllers\Admin\LoginController;
use App\Livewire\AddProductComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


//Group Route
Route::group(['namespace' => 'Admin'], function() {
    Route::group(['prefix' => 'login'], function() {
        Route::get('/', [LoginController::class, 'getLogin']);
        Route::post('/', [LoginController::class, 'postLogin']);
    });
});
