<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::prefix('/')->namespace('AdminArea')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('users/all', 'UserController@index')->name('users-all');
    Route::get('users/create', 'UserController@create')->name('users-create');
    Route::get('/checkemail', 'UserController@checkEmail')->name('email-available-check');

    Route::prefix('/project')->group(function () {

        Route::get('/all', 'ProjectController@index')->name('project.all');
        Route::get('/create', 'ProjectController@create')->name('project.create');
        Route::post('/store', 'ProjectController@store')->name('project.store');
        Route::get('/{id}/edit', 'ProjectController@edit')->name('project.edit');
        Route::put('/{id}/update', 'ProjectController@update')->name('project.update');
        Route::delete('/{id}/delete', 'ProjectController@delete')->name('project.delete');

    });

    //visitor request
Route::prefix('visitor')->group(function () {
    Route::get('/', 'VisitorRequestController@index')->name('requests.all');
    Route::get('/{id}/delete', 'VisitorRequestController@delete')->name('requests.delete');
    Route::get('/{id}/view', 'VisitorRequestController@view')->name('requests.view');
    Route::get('/change-status/{visitor_id?}', 'VisitorRequestController@changeStatus')->name('request.status.change');

});

//Sliders
Route::prefix('sliders')->group(function () {
    Route::get('/', 'SliderController@index')->name('sliders.all');
    Route::get('/new', 'SliderController@new')->name('sliders.new');
    Route::post('/store', 'SliderController@store')->name('sliders.store');
    Route::get('/{slider_id}/edit', 'SliderController@edit')->name('sliders.edit');
    Route::post('/{slider_id}/update', 'SliderController@update')->name('sliders.update');
    Route::get('/{slider_id}/delete', 'SliderController@delete')->name('sliders.delete');
    Route::get('/{slider_id}/view', 'SliderController@show')->name('sliders.view');

});

});
