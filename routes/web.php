<?php

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

/* Route::get('/', function () {
    return view('welcome')
	-> with ('title','首頁')
	-> with ('hello','<font color=red>GO!!!</font>');
}); */

Route::get('/', 'HomeController@index');

Route::get('foo', function()
{
    return 'Hello Laravel~~';
});

/* //display article
Route::get('post/{id}', 'HomeController@show');

Route::get('post', 'HomeController@index');

//add article
Route::get('create', 'HomeController@create');

//save article
Route::post('post', 'HomeController@store');

//edit article
Route::get('post/{id}/edit', 'HomeController@edit');

//update article
Route::put('post/{id}', 'HomeController@update');

//delete article
Route::delete('post/{id}', 'HomeController@destroy'); */

//Group article function
Route::group(['prefix'=>'post'],function(){
	Route::get('/', 'HomeController@index');	
	Route::get('create', 'HomeController@create');
	Route::post('/', 'HomeController@store');
	Route::get('/{id}', 'HomeController@show');
	Route::get('/{id}/edit', 'HomeController@edit');
	Route::put('/{id}', 'HomeController@update');
	Route::delete('/{id}', 'HomeController@destroy');
}

);

Route::get('/form', function () {
    return view('formtest');
});
