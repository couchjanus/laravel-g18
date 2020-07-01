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
Auth::routes();
// Auth::routes(['verify' => true]);

Route::get('/home', function () {
    return redirect('profile');
});

// Mailable

Route::get('reminder', function () {
    // return new \App\Mail\Reminder();
    return new \App\Mail\Reminder('Blahuoooo!');
});

// Route::post('rem', function (\Illuminate\Http\Request $request) {
//     dd($request);
// })->name('reminder');

Route::post('rem', function (
    \Illuminate\Http\Request $request, 
    \Illuminate\Mail\Mailer $mailer) {
        $mailer->to($request->email)
        ->send(new \App\Mail\Reminder($request->event));
        return redirect()->back();    
    }
)->name('reminder');

Route::get('invite', function () {
    // return (new App\Mail\Invitation())->render();
    $url = 'http://my.cat'; // Your Invite Link
    return (new App\Mail\Invitation($url))->render();
});

Route::get('register/request', 'Auth\RegisterController@requestInvitation')->name('requestInvitation');
Route::post('invitations', 'InvitationController@store')->middleware('guest')->name('storeInvitation');

// 
Route::fallback(function() {
    return "Oops… How you've trapped here?";
});
