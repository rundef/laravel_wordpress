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


Route::group(['namespace' => 'Site'], 
    function () {
    
    Route::auth();
    Route::get('/', 'MainController@index');
    Route::get('/home', 'MainController@index');
});



Route::group(['middleware' => 'auth.wordpress:,edit_cms_events', 'namespace' => 'CMS', 'prefix' => 'cms'], 
    function () {
    
    Route::get('/events', 'EventsController@getList');
    Route::post('/events', 'EventsController@postSearch');
    Route::get('/events/filter', 'EventsController@setFilters');
 
    Route::group(['prefix' => 'event'], function () {
        Route::get('/create', 'EventsController@getCreate');
        Route::post('/create', 'EventsController@postCreate');
        Route::get('/{id}/edit', 'EventsController@getEdit');
        Route::post('/{id}/edit', 'EventsController@postEdit');
        Route::any('/{id}/delete', 'EventsController@postDelete');
        Route::get('/{id}/untrash', 'EventsController@untrash');
    });
});
