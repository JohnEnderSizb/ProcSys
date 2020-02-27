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

header('Access-Control-Allow-Origin: *');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/ajaxTest', 'TestsController@ajaxTest');


Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}/init', 'ProfileController@initialize');
    Route::post('/profile/{user}/init', 'ProfileController@create');
});



//Procurements
Route::middleware('auth', 'profile', 'isSupervisor')->group(function () {
    //ASSETS
    Route::get('/home', 'ProcurementController@index');
    Route::get('/test', 'ProcurementController@test')->name('test');
    Route::get('/links', 'ProcurementController@links')->name('links');
    Route::get('/settings', 'ProcurementController@settings')->name('settings');
    Route::get('/help', 'ProcurementController@helpCenter')->name('helpCenter');
    Route::get('/mail', 'ProcurementController@mail')->name('mail');
    Route::get('/profile/1/admin', 'ProcurementController@admin')->name('admin');
    Route::get('/profile/1/stats', 'ProcurementController@statistics')->name('stats');

    Route::get('/profile/specification/create', 'ProcurementController@create')->name('create');
    Route::post('/profile/specification/create', 'ProcurementController@store');
    Route::get('/view', 'ProcurementController@view');
    Route::get('/specifications/{theID}/view', 'ProcurementController@viewOne');

    //AJAX
    Route::post('/specification/approve', 'AjaxController@approve');
    Route::get('/specification/approve', 'AjaxController@approvet');
    Route::post('/specification/decline', 'AjaxController@decline');

    Route::get('/profile/{profile}/view', 'ProfileController@update');
    Route::post('/profile/update', 'ProfileController@storeUpdate');

    Route::post('/account/settings', 'ProcurementController@accountSettings');

    //ASSETS
    Route::get('/assets/home', 'AssetsController@index');
    Route::get('/assets/collection', 'AssetsController@collection');
    Route::get('/assets/collected', 'AssetsController@collected');
    Route::get('/assets/declined', 'AssetsController@declined');
    Route::get('/assets/notAvail', 'AssetsController@notAvail');

    Route::post('/assets/manage/show', 'AssetsController@manageShow');

    Route::post('/assets/manage/approve', 'AssetsController@approve');
    Route::post('/assets/manage/decline', 'AssetsController@decline');
    Route::post('/assets/manage/notAvailable', 'AssetsController@notAvailable');


    //TESTING
    Route::get('/test/testing', 'TestController@test');
});


Route::post('/app/assets/collect', 'AssetsController@collectApp');
Route::post('/app/login', 'AssetsController@appLogin');


Route::get('simple-qr-code', function () {
    return QrCode::size(200)->generate('W3Adda Laravel Tutorial');
});



Route::get('/{any}', 'VueController@index')->where('any', '.*');

Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);




