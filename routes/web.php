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
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
        Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
        Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
        Route::resource('posts', 'PostController');
        Route::resource('tags', 'TagController');
        Route::get('invitations', 'InvitationController@index')->name('showInvitations');
        Route::post('invite/{id}', 'InvitationController@sendInvite')
        ->name('send.invite');
});

Route::group(['as' => 'blog.', 'prefix' => 'blog'], function () {
    Route::get('', 'BlogController@index')->name('index');
    Route::get('category/{id}', 'BlogController@getByCategory');
    Route::get('author/{id}', 'BlogController@getByAuthor');
    Route::get('show/{id}', 'BlogController@show');
});

Route::middleware('auth')
    // ->middleware('verified')
   ->prefix('profile')->as('profile.')
   ->group(function () {
       Route::get('', 'ProfileController@index')
           ->name('home');
       Route::get('info', 'ProfileController@show')
           ->name('info');
       Route::put('store', 'ProfileController@store')
           ->name('store');
});
 
// Еще какие-то маршруты....
Auth::routes(['verify' => true]);

Route::get('/home', function () {
    return redirect('profile');
});

// Mailable
Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
Route::post('invitations', 'InvitationController@store')->middleware('guest')->name('storeInvitation');

// Socialite Register Routes

Route::get('social/{provider}', 'Auth\SocialController@redirect')->name('social.redirect');
Route::get('social/{provider}/callback', 'Auth\SocialController@callback')->name('social.callback');

// 
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
