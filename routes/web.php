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
    return view('guests.home');
});

Route::get('/specialist', function () {
    return view('guests.specialist');
})->name('specialist');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){

        // Admin homepage
        Route::get('/home', 'HomeController@index')->name('home');

        // Doctor Route
        Route::resource('/doctor', 'DoctorController');
});

// Guest 'any' route
Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*' );


