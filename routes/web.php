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

Route::post('/unread',[
	'uses'=>'ItemController@getUnread',
	'as'=>'unread'
	]);

Route::post('/s_update',[
	'uses'=>'ItemController@status_update',
	'as'=>'s_update'
	]);