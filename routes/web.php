<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('manage-item-ajax', 'ItemAjaxController@manageItemAjax');
Route::resource('item-ajax', 'ItemAjaxController');

Route::get('/getItem',[
	'uses'=>'ItemController@getItem',
	'as'=>'getItem'
	]);

Route::get('/list',[
	'uses'=>'ItemController@itemList',
	'as'=>'list'
	]);

Route::post('/store',[
	'uses'=>'ItemController@store',
	'as'=>'store'
	]);

Route::post('/delete',[
    'uses'=>'ItemController@delete',
    'as' => 'delete'
    ]);

Route::post('/update',[
    'uses'=>'ItemController@update',
    'as' => 'delete'
    ]);

Route::get('/unread',[
	'uses'=>'ItemController@getUnread',
	'as'=>'unread'
	]);

Route::post('/s_update',[
	'uses'=>'ItemController@status_update',
	'as'=>'s_update'
	]);

/* Single Page with Multiple Button */
Route::get('/savePost',[
	'uses'=>'ItemController@savePost',
	'as'=>'savePost'
	]);


/* Tab bar Example*/
Route::get('/testItem',[
	'uses'=>'ItemController@gettestItem',
	'as'=>'testItem'
	]);

Route::post('/showitems',[
	'uses'=>'ItemController@showitems',
	'as'=>'showitems'
	]);

Route::get('/saveApiData',[
	'uses' => 'ItemController@saveApiData',
	'as'=>'saveApiData'
	]);

Route::post('/register',[
	'uses' =>'ItemController@getRegister',
	'as'=>'register'
	]);

Route::get('/register',[
	'uses'=>'ItemController@registerPage',
	'as'=>'registerPage'
	]);

Route::get('/getUser',[
	'uses'=>'ItemController@search',
	'as'=>'getUser'
	]);