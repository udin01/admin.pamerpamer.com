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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    
    // Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => 'web'], function () {
        
        /*
        Route::get('/', [
            'as' => 'expoproperty_front.home',
            'uses' => 'HomeController@getHome',
        ]);
        */
        Route::get('/debugJson/{slug?}', [
            'as' => 'expoproperty_front.debugJson',
            'uses' => 'debugController@getdebugJson',
        ]);

});
