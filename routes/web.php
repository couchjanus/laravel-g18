<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Admin')
    ->prefix('admin')
    ->as('admin.')
	->group(function () {
        Route::get('/', 'DashboardController'); 	 
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
});

// Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {	 
//     Route::group(['as' => 'comments.', 'prefix' => 'comments'], function () {	 
//         // you can use by in helper like route('blog.comments.list')          	 
//         Route::get('{id}', function () { 
//             // 
//         })->name('list'); 
//     });
// });

// Еще какие-то маршруты....

// Route::fallback(function() {
//     return "Oops… How you've trapped here?";
// });
