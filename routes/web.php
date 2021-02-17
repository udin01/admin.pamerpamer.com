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
    
    Route::group(['middleware' => 'auth'], function () {
    // Route::group(['middleware' => 'web'], function () {
        Route::get('/', [
            'as' => 'expoproperty_front.home',
            'uses' => 'HomeController@getHome',
        ]);
        Route::get('/perumahan/{dev}/{id}', [
            'as' => 'expoproperty_front.slugDev',
            'uses' => 'HomeController@getSlugDev',
        ]);
        Route::get('/developer/{id}', [
            'as' => 'expoproperty_front.dev',
            'uses' => 'HomeController@getDev',
        ]);
        Route::get('/regionalId/{id}', [
            'as' => 'expoproperty_front.regional',
            'uses' => 'HomeController@getDev',
        ]);
        Route::get('/regional/{slug}', [
            'as' => 'expoproperty_front.regionalSlug',
            'uses' => 'HomeController@getRegional',
        ]);

        Route::get('/download-browsur/{id}', [
            'as' => 'expoproperty_front.downloadBrowsur',
            'uses' => 'HomeController@getDownloadBrowsur',
        ]);

        Route::get('/view-browsur/{id}', [
            'as' => 'expoproperty_front.viewBrowsur',
            'uses' => 'HomeController@getViewBrowsur',
        ]);

        Route::get('/my-account', [
            'as' => 'expoproperty_front.myAccount',
            'uses' => 'HomeController@getMyAccount',
        ]);

        Route::get('/event/{id}', [
            'as' => 'expoproperty_front.event',
            'uses' => 'HomeController@getEvent',
        ]);

        Route::post('/sendComment', [
            'as' => 'expoproperty_front.sendComment',
            'uses' => 'HomeController@sendComment',
        ]);

        Route::post('/gooAnalytic', [
            'as' => 'expoproperty_front.gooAnalytic',
            'uses' => 'HomeController@gooAnalytic',
        ]);

        Route::get('/webhook', [
            'as' => 'expoproperty_front.webhook',
            'uses' => 'HomeController@webhook',
        ]);

        Route::get('/webhook/', [
            'as' => 'expoproperty_front.webhook',
            'uses' => 'HomeController@webhook',
        ]);
    });

    Route::get('/login', [
        'as' => 'expoproperty_front.login',
        'uses' => 'HomeController@getLogin',
    ]);
    Route::get('/login', [
        'as' => 'login',
        'uses' => 'HomeController@getLogin',
    ]);
    Route::post('/post-login', [
        'as' => 'postLogin',
        'uses' => 'AuthController@login',
    ]);
    
    Route::post('/post-register', [
        'as' => 'postRegister',
        'uses' => 'AuthController@register',
    ]);
    Route::get('/register', [
        'as' => 'register',
        'uses' => 'HomeController@showFormRegister',
    ]);
    Route::get('/logout', [
        'as' => 'logout',
        'uses' => 'AuthController@logout',
    ]);
    Route::post('/waKamu', [
        'as' => 'waKamu',
        'uses' => 'AuthController@waKamu',
    ]);
    Route::post('/getOTP', [
        'as' => 'getOTPlagi',
        'uses' => 'AuthController@getOTPlagi',
    ]);

});
