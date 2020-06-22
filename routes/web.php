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
})->name('main');

Route::namespace('Admin')
    ->prefix('admin')
    ->as('admin.')
	->group(function () {
        Route::get('/', 'DashboardController')->name('home');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
        Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
        Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
        Route::resource('posts', 'PostController');
});

Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
    Route::get('', 'BlogController@index')->name('index');
    Route::get('category/{id}', 'BlogController@getByCategory');
    Route::get('author/{id}', 'BlogController@getByAuthor');
    Route::get('show/{id}', 'BlogController@show');
});
 
// Еще какие-то маршруты....
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
