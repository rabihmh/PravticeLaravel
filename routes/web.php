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

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('fillable',"App\Http\Controllers\CrudController@getOffers");


Route::group(['prefix'=>\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    Route::group(['prefix'=>'offers'],function () {
//    Route::get('store', 'App\Http\Controllers\CrudController@store');
        Route::get('create','App\Http\Controllers\CrudController@create');


        Route::post('store','App\Http\Controllers\CrudController@store')->name('offers.store');
    });
});
