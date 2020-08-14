<?php

use App\Http\Controllers\HomeController;
use GuzzleHttp\Middleware;
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

Route::get('/home', 'HomeController@index');


Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::get('profile/', 'AdminController@viewProfile')->name('profile');
    Route::get('setting/', 'AdminController@setting')->name('setting');

});

Route::get('/login/{provider}', 'Auth\SocialController@redirect')->where('provider', 'facebook|google');
Route::get('/login/{provider}/callback', 'Auth\SocialController@callback')->where('provider', 'facebook|google');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
