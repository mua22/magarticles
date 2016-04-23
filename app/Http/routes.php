<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/',array(
        'uses'=>'FrontEnd\ArticlesController@index',
        'as' => 'home'
    ));

    Route::get('category/{any?}',array(
        'uses' => 'FrontEnd\ArticlesController@index',
        'as'=>'category'
    ))->where('any', '(.*)?');
    Route::get('/events/calendar',array(
        'uses'=>'FrontEnd\EventsController@calendar',
        'as'=>'events.calendar'
    ));
    Route::get('/events/calendar/ajax',array(
        'uses'=>'FrontEnd\EventsController@getAjaxEvents',
        'as'=>'events.calendar.ajax'
    ));
    Route::get('articles/create/{any?}',array(
        'uses' => 'FrontEnd\ArticlesController@create',
        'as'=>'frontend.articles.create'
    ))->where('any', '(.*)?');
    Route::get('articles/{any?}',array(
        'uses' => 'FrontEnd\ArticlesController@show',
        'as'=>'frontend.articles.show'
    ));
    Route::post('articles','FrontEnd\ArticlesController@store');

    //Route::get('/profile','ProfilesController@index');
    //Route::get('/students', 'StudentsController@index');
    /*Route::get('/articles','ArticlesController@index');
    Route::get('/articles/create','ArticlesController@create');

    Route::post('articles','ArticlesController@store');*/
    //Route::resource('categories','Admin\CategoriesController');
    Route::get('/categories',array(
        'uses'=>'FrontEnd\ArticlesController@index',
        'as' => 'site.categories'
    ));

    //Route::resource('articles','ArticlesController');
    //Route::controller('posts', 'ArticlesController');
    Route::get('/about','PagesController@about');
    Route::get('/contact','PagesController@contact');
    Route::get('auth/facebook', 'Auth\AuthController@redirectToFacebook');
    Route::get('auth/facebook/callback', 'Auth\AuthController@handleFacebookCallback');
    Route::controllers([
        'auth'=>'Auth\AuthController',
        'password'=>'Auth\PasswordController'
    ]);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/backend', 'Admin\AdminController@welcome');

    /**
     * All Admin routes Goes here
     */

    Route::group(['middleware' => ['role:admin']], function() {
            Route::get('backend', 'Admin\AdminController@welcome');

    });
});


