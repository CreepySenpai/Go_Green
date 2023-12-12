<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\ShopController;
use App\Http\Controllers\Customer\SignInUp;
use App\Http\Controllers\Customer\ProductDetailsController;
use App\Http\Controllers\Customer\AddtoCart;
use App\Livewire\AddProductComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Models\Category;
use App\Models\Product;
use App\Models\cus_account;
use App\Http\Controllers\Admin\ProductController;

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


// //Group Route In Folder Admin
// Route::group(['namespace' => 'Admin'], function() {
//     // If user press login we check if user was logged
//     Route::group(['prefix' => 'login', 'middleware' => 'CheckLoggedIn'], function() {
//         Route::get('/', [LoginController::class, 'getLogin']);
//         Route::post('/', [LoginController::class, 'postLogin']);
//     });

//     // Check if guest try to go home page with out loggin
//     Route::group(['prefix' => 'admin', 'middleware' => ['CheckLoggedOut', 'AdminLoggin']], function(){
//         Route::get('/home', [HomeController::class, 'getHome']);

//         Route::get('/logout', [HomeController::class, 'getLogout']);

//         Route::get('/search', [ProductController::class, 'getSearchResult']);

//         Route::group(['prefix' => 'category'], function(){
//             Route::get('/', [CategoryController::class, 'getCategory']);
//             Route::post('/', [CategoryController::class, 'postCategory']);

//             Route::get('/edit/{id}', [CategoryController::class, 'getEditCategory']);
//             Route::post('/edit/{id}', [CategoryController::class, 'postEditCategory']);

//             Route::get('/delete/{id}', [CategoryController::class, 'getDeleteCategory']);
//         });

//         Route::group(['prefix' => 'product'], function(){
//             Route::get('/', [ProductController::class, 'getProduct']);


//             Route::get('/add', [ProductController::class, 'getAddProduct']);
//             Route::post('/add', [ProductController::class, 'postAddProduct']);

//             Route::get('/edit/{id}', [ProductController::class, 'getEditProduct']);
//             Route::post('/edit/{id}', [ProductController::class, 'postEditProduct']);

//             Route::get('/delete/{id}', [ProductController::class, 'getDeleteProduct']);
//         });
//     });


// });

Route::group(['prefix' => 'AdLogin', 'middleware' => 'CheckLoggedIn'], function() {
    Route::get('/', [LoginController::class, 'getLogin']);
    Route::post('/', [LoginController::class, 'postLogin']);
});

Route::group(['prefix' => 'AdRegister'], function() {
    Route::get('/', [RegisterController::class, 'getRegister']);
    Route::post('/', [RegisterController::class, 'postRegister']);
});


// Group Route In Folder Admin
Route::group(['namespace' => 'Admin'], function() {

    // Check if guest try to go home page with out loggin
    // Route::group(['prefix' => 'admin', 'middleware' => ['CheckLoggedOut', 'AdminLoggin']], function(){
    Route::group(['prefix' => 'admin'], function(){

        Route::get('/home', [HomeController::class, 'getHome']);

        Route::get('/logout', [HomeController::class, 'getLogout']);

        Route::group(['prefix' => 'category'], function(){
            Route::get('/', [CategoryController::class, 'getCategory']);

            Route::get('/add/', [CategoryController::class, 'getAddCategory']);
            Route::post('/add/', [CategoryController::class, 'postAddCategory']);

            Route::get('/edit/{id}', [CategoryController::class, 'getEditCategory']);
            Route::post('/edit/{id}', [CategoryController::class, 'postEditCategory']);

            Route::get('/delete/{id}', [CategoryController::class, 'getDeleteCategory']);
        });

        Route::group(['prefix' => 'product'], function(){
            Route::get('/', [ProductController::class, 'getProduct']);


            Route::get('/add', [ProductController::class, 'getAddProduct']);
            Route::post('/add', [ProductController::class, 'postAddProduct']);

            Route::get('/edit/{id}', [ProductController::class, 'getEditProduct']);
            Route::post('/edit/{id}', [ProductController::class, 'postEditProduct']);

            Route::get('/delete/{id}', [ProductController::class, 'getDeleteProduct']);
        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('/', [UserController::class, 'getUser']);
            Route::get('/edit/{user_id}', [UserController::class, 'getEditUser']);
            Route::post('/edit/{user_id}', [UserController::class, 'postEditUser']);
            Route::get('/delete/{user_id}', [UserController::class, 'getDeleteUser']);
        });

        Route::group(['prefix' => 'order'], function(){
            Route::get('/', [OrderController::class, 'getOrder']);
            Route::get('/delete/{order_id}', [OrderController::class, 'getDeleteOrder']);
        });
    });
});

//Group Route In Folder Customer
Route::group(['namespace' => 'Customer'], function() {
    //show data in shop page
    Route::group(['prefix' => 'shop'], function(){
        Route::get('/', [ShopController::class, 'getData'])->name(name: 'shop');;
    });

    //product_list route
    Route::get('/shoplist/{cate_slug}', [ShopController::class, 'filterByCategory']);

    //product_details route
    Route::get('/product_details/{product_id}', [ShopController::class, 'product_details']);

    //Login and logout route
    Route::get('/CusLogin', [SignInUp::class, 'login'])->name(name: 'CusLogin')->middleware('alreadyLoggedIn');
    Route::post('/CusLogin', [SignInUp::class, 'postCusLogin'])->name(name: 'CusLogin.post');
    Route::get('/logout', [SignInUp::class, 'Logout']);
    //register
    Route::get('/CusRegister', [SignInUp::class, 'register'])->name(name: 'CusRegister')->middleware('alreadyLoggedIn');
    Route::post('/CusRegister', [SignInUp::class, 'postCusRegister'])->name(name: 'CusRegister.post');

    //Add to Cart route
    Route::get('/Cart', [AddtoCart::class, 'showPage'])->middleware('isLoggedIn')->name(name: 'cart');
    Route::post('/Cart/{product_id}', [AddtoCart::class, 'add_temp_cart'])->name(name: 'temp_cart.post')->middleware('isLoggedIn');
    Route::get('/remove_cart/{id}', [AddtoCart::class, 'Remove_temp_cart']);
    Route::post('/update-cart', [AddtoCart::class, 'update_temp_cart'])->name(name: 'update-cart.post');

    //check out  route
    Route::get('/checkout', [AddtoCart::class, 'checkoutPage'])->name(name: 'checkout');

    //Order page route
    Route::get('/CheckOrder', [AddtoCart::class, 'OrderPage'])->middleware('isLoggedIn');
    Route::post('/CheckOrder', [AddtoCart::class, 'add_order'])->name(name: 'CheckOrder.post');
    Route::get('/remove_order/{id}', [AddtoCart::class, 'Remove_cart']);
});
