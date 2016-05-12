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
    Route::get('/',['as' => 'homepage', 'uses' => 'Frontend\HomeController@homepage']);
    Route::get('article/{slug}',['as' => 'frontend.article.show','uses' => 'Frontend\ArticleController@show']);
    // Not implemented yet so commented.
/*    Route::get('category/{any?}', [
            'as' => 'category',
            'uses' => 'Frontend\CategoriesController@index'
        ])->where('any', '(.*)?');

    Route::get('/profile','ProfilesController@index');
    Route::get('/students', 'StudentsController@index');
    Route::get('/articles','ArticlesController@index');*/

    Route::auth();
    // All web based admin backend routes starts from here.
    Route::group(['prefix' => 'backend', 'middleware' => ['role:admin']], function() {

        Route::get('/', ['as' => 'backend.dashboard', 'uses' => 'Backend\BackendController@dashboard']);

        Route::resource('articles', 'Backend\ArticlesController');
        Route::resource('users', 'Backend\UsersController');
        Route::resource('tags', 'Backend\TagsController');
    });

});
