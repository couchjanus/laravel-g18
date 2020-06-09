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


Route::get('/env', function () {
    $environment = App::environment();
    if (App::environment('local')) {
        // The environment is local
        ddd('The environment is local', $environment);
    }
    
    if (App::environment(['local', 'staging'])) {
        // The environment is either local OR staging...
        ddd('The environment is either local OR staging...', $environment);
    }
    

});

use Carbon\Carbon;

Route::get('/conf', function () {

    dump(Carbon::SUNDAY);                          // int(0)
    dump(Carbon::MONDAY);                          // int(1)
    dump(Carbon::TUESDAY);                         // int(2)
    dump(Carbon::WEDNESDAY);                       // int(3)
    dump(Carbon::THURSDAY);                        // int(4)
    dump(Carbon::FRIDAY);                          // int(5)
    dump(Carbon::SATURDAY);                        // int(6)

    $config = config('database.default');
    dd($config);
    $config =Config::get('app.name');
    dd($config);

});


Route::get('/ddd', function () {
    $user = new App\User();
    ddd('dumping this one', $user);
});