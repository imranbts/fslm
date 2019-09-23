<?php

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

Auth::routes();

/**
 *
 * Dashboard Routes
 */
Route::middleware(['auth','checkrole'])->group(function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

});

Route::post('logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');


/* Route::group(
    [
        'middleware' => ['auth','checkrole'],
    ],
    function () {

        // dashboard

        Route::get('/dashboard', function(){

            return  redirect("/dashboard");

        });

    }
); */
