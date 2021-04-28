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
        Route::get('/perumahan/{dev}/{id}', [
            'as' => 'expoproperty_front.slugDev',
            'uses' => 'HomeController@getSlugDev',
        ]);
        Route::get('/perusahaan/{id?}', [
            'as' => 'expoproperty_front.dev',
            'uses' => 'HomeController@getDev',
        ]);

        Route::get('/job-detail/{id}', [
            'as' => 'expoproperty_front.jobDetail',
            'uses' => 'HomeController@getProduct',
        ]);

        Route::get('/category/{slug?}', [
            'as' => 'expoproperty_front.regionalSlug',
            'uses' => 'HomeController@getRegional',
        ]);
        
        Route::get('/search-job/{s?}', [
            'as' => 'expoproperty_front.searchProduct',
            'uses' => 'HomeController@getSearchProduct',
        ]);

        Route::get('/regionalId/{id}', [
            'as' => 'expoproperty_front.regional',
            'uses' => 'HomeController@getDev',
        ]);


        Route::get('/job/{id?}', [
            'as' => 'expoproperty_front.product',
            'uses' => 'HomeController@getProduct',
        ]);

        Route::get('/kategori-jobs/{id?}', [
            'as' => 'expoproperty_front.kategoriProduct',
            'uses' => 'HomeController@getKategoriProduct',
        ]);
        
        Route::get('/kategori-jobs/{slug?}', [
            'as' => 'expoproperty_front.kategoriProductSlug',
            'uses' => 'HomeController@getKategoriProductSlug',
        ]);

        Route::get('/save-job/{id?}', [
            'as' => 'expoproperty_front.saveJob',
            'uses' => 'HomeController@postSaveJob',
        ]);
        Route::get('/save-job-delete/{id?}', [
            'as' => 'expoproperty_front.saveJobDelete',
            'uses' => 'HomeController@postSaveJobDelete',
        ]);

        Route::post('/apply-job/{id?}', [
            'as' => 'expoproperty_front.applyJob',
            'uses' => 'HomeController@postApplyJob',
        ]);
        Route::get('/apply-job-delete/{id?}', [
            'as' => 'expoproperty_front.applyJobDelete',
            'uses' => 'HomeController@postApplyJobDelete',
        ]);

         Route::get('/attachement/{id?}', [
            'as' => 'expoproperty_front.viewFile',
            'uses' => 'HomeController@getViewFile',
        ]);

        
        // ==========================================================


        Route::get('/download-browsur/{id}', [
            'as' => 'expoproperty_front.downloadBrowsur',
            'uses' => 'HomeController@getDownloadBrowsur',
        ]);

        Route::get('/view-browsur/{id}', [
            'as' => 'expoproperty_front.viewBrowsur',
            'uses' => 'HomeController@getViewBrowsur',
        ]);


        // Route::group(['middleware' => 'auth'], function () {
        //     Route::get('/my-account', [
        //         'as' => 'expoproperty_front.myAccount',
        //         'uses' => 'HomeController@getMyAccount',
        //     ]);
        // });


        Route::get('/event/{id?}', [
            'as' => 'expoproperty_front.event',
            'uses' => 'HomeController@getEvent',
        ]);

        Route::get('/promo', [
            'as' => 'expoproperty_front.klaimPromo',
            'uses' => 'HomeController@getKlaimPromo',
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
    // });

    Route::get('/', [
        'as' => 'expoproperty_front.home',
        'uses' => 'HomeController@getWelcome',
    ]);

    Route::get('/home', [
        'as' => 'expoproperty_front.home2',
        'uses' => 'HomeController@getHome',
    ]);

    Route::get('/welcome', [
        'as' => 'expoproperty_front.login',
        'uses' => 'HomeController@getWelcome',
    ]);

    Route::get('/login', [
        'as' => 'expoproperty_front.login',
        'uses' => 'HomeController@getLogin',
    ]);
    Route::get('/signup', [
        'as' => 'expoproperty_front.signup',
        'uses' => 'HomeController@getSignup',
    ]);
    Route::post('/post-signup', [
        'as' => 'expoproperty_front.post-signup',
        'uses' => 'AuthController@postSignup',
    ]);
    Route::post('/postlogin', [
        'as' => 'expoproperty_front.post-login',
        'uses' => 'AuthController@postLogin',
    ]);
    // Route::get('/akunku', [
    //     'as' => 'expoproperty_front.akunku',
    //     'uses' => 'HomeController@getAkunku',
    // ]);
    Route::get('/my-account/{act?}', [
        'as' => 'expoproperty_front.myAccount',
        'uses' => 'HomeController@getAkunku',
    ]);
    Route::post('/save-account', [
        'as' => 'expoproperty_front.saveAccount',
        'uses' => 'HomeController@postAkun',
    ]);
    Route::post('/upload-cv', [
        'as' => 'expoproperty_front.uploadcv',
        'uses' => 'HomeController@postUploadcv',
    ]);


    // ==========================================================
    // ==========================================================
    // ==========================================================


    Route::get('/test-view', [
        'as' => 'test.view',
        'uses' => 'TestController@getHome',
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
    Route::get('/maintenance', [
        'as' => 'maintenance',
        'uses' => 'HomeController@getMaintenance',
    ]);

});
