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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();





Route::group(['prefix' =>'admin','middleware'=>'auth'], function(){


Route::get('/home'       ,['as' => 'home'           ,'uses' => 'HomeController@index']);
Route::get('/post/index' ,['as' => 'post.index'     ,'uses' => 'PostsController@index']);
Route::get('/post/create',['as' => 'post.create'    ,'uses' => 'PostsController@create']);
Route::post('/post/store',['as' => 'post.store'     ,'uses' => 'PostsController@store']);
Route::get('/post/show/{id}',['as' => 'post.show' ,'uses' => 'PostsController@show']);
Route::get('/post/delete/{id}',['as' => 'post.delete' ,'uses' => 'PostsController@destroy']);
Route::get('/post/trashed',['as' => 'post.trashed' ,'uses' => 'PostsController@trash']);
Route::get('/post/kill/{id}',['as' => 'post.kill' ,'uses' => 'PostsController@kill']);
Route::get('/post/restore/{id}',['as' => 'post.restore' ,'uses' => 'PostsController@restore']);


Route::get('/post/edit/{id}',['as' => 'post.edit' ,'uses' => 'PostsController@edit']);
Route::post('/post/update/{id}',['as' => 'post.update' ,'uses' => 'PostsController@update']);





Route::get('/category/index' ,['as' => 'category.index' ,'uses' => 'CategoriesController@index']);
Route::get('/category/create' ,['as' => 'category.create' ,'uses' => 'CategoriesController@create']);
Route::post('/category/store' ,['as' => 'category.store' ,'uses' => 'CategoriesController@store']);
Route::get('/category/delete/{id}',['as' => 'category.delete' ,'uses' => 'CategoriesController@destroy']);
Route::get('/category/edit/{id}',['as' => 'category.edit' ,'uses' => 'CategoriesController@edit']);
Route::post('/category/update/{id}',['as' => 'category.update' ,'uses' => 'CategoriesController@update']);



});

Route::get('/post/edit','PostsController@edit');
Route::get('/post/update','PostsController@update');

Route::get('/post/delete','PostsController@delete');


