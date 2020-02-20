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

Route::get('/sess', function () {
    $value = session('key', 'default');

    // Store a piece of data in the session...
    session(['key' => 'Titans victory dance.']);
});

Route::get('/retr', function () {
    // Retrieve a piece of data from the session...
    $value = session('key');
    return $value;
});

//Procurements
Route::middleware('auth', 'profile', 'isSupervisor')->group(function () {
    Route::get('/home', 'ProcurementController@index');
    Route::get('/test', 'ProcurementController@test')->name('test');
    Route::get('/links', 'ProcurementController@links')->name('links');
    Route::get('/settings', 'ProcurementController@settings')->name('settings');
    Route::get('/help', 'ProcurementController@helpCenter')->name('helpCenter');
    Route::get('/mail', 'ProcurementController@mail')->name('mail');
    Route::get('/1/profile/view', 'ProcurementController@profile')->name('profile');
    Route::get('/profile/1/admin', 'ProcurementController@admin')->name('admin');
    Route::get('/profile/1/stats', 'ProcurementController@statistics')->name('stats');

    Route::get('/profile/specification/create', 'ProcurementController@create')->name('create');
    Route::post('/profile/specification/create', 'ProcurementController@store');
    Route::get('/view', 'ProcurementController@view');
    Route::get('/specifications/{theID}/view', 'ProcurementController@viewOne');



});

Route::get('/init', 'ProcurementController@initialize');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}/init', 'ProfileController@initialize');
    Route::post('/profile/{user}/init', 'ProfileController@create');
});






Route::get('/{any}', 'VueController@index')->where('any', '.*');

Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);



