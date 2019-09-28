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
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/permission-create', 'PermissionController@create')->name('permission-create');

    Route::get('/manage-users', 'UserController@index')->name('manage-users');

    Route::post('/manage-users/store', 'UserController@store')->name('manage-users-store');

    Route::delete('/manage-users/destroy/{id}', 'UserController@destroy')->name('manage-users-destroy');

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
