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



Auth::routes();


Route::get('/results', function(){
        $posts = \App\Post::where('title','like',  '%' . request('query') . '%')->get();
        return view('results')->with('posts', $posts)
                              ->with('title', 'Search results : ' . request('query'))
                              ->with('settings', \App\Setting::first())
                              ->with('categories', \App\Category::take(5)->get())
                              ->with('query', request('query'));
});





Route::group(['prefix' =>'admin','middleware'=>'auth'], function(){

Route::get('/index',['as' => 'index' ,'uses' => 'FrontendController@index']);


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


Route::get('/tag/index',['as' => 'tag.index' ,'uses' => 'TagsController@index']);
Route::get('/tag/create',['as' => 'tag.create' ,'uses' => 'TagsController@create']);
Route::post('/tag/store',['as' => 'tag.store' ,'uses' => 'TagsController@store']);
Route::get('/tag/delete/{id}',['as' => 'tag.delete' ,'uses' => 'TagsController@destroy']);
Route::get('/tag/edit/{id}',['as' => 'tag.edit' ,'uses' => 'TagsController@edit']);
Route::post('/tag/update/{id}',['as'=>'tag.update','uses' =>'TagsController@update']);


Route::get('/user/index',['as' => 'user.index' ,'uses' => 'UsersController@index']);
Route::get('/user/create',['as' => 'user.create' ,'uses' => 'UsersController@create']);
Route::post('/user/store',['as' => 'user.store' ,'uses' => 'UsersController@store']);

Route::get('/user/delete/{id}',['as' => 'user.delete' ,'uses' => 'UsersController@destroy']);
Route::get('/user/admin/{id}',['as' => 'user.admin' ,'uses' => 'UsersController@admin']);
Route::get('/user/notadmin/{id}',['as' => 'user.not-admin' ,'uses' => 'UsersController@not_admin']);


Route::get ('/user/profile',['as' => 'user.profile' ,'uses' => 'ProfilesController@index']);
Route::post('/user/profile',['as' => 'user.profile.update' ,'uses' => 'ProfilesController@update']);

Route::get('/edit/blog',['as' => 'blog.edit' ,'uses' => 'SettingsController@edit']);
Route::post('/edit/blog',['as' => 'blog.update' ,'uses' => 'SettingsController@update']);

Route::get('admin/{slug}',['as' => 'post.single' ,'uses' => 'FrontendController@singlePost']);

Route::get('/category/{id}', [
    'uses' => 'FrontendController@category',
    'as' => 'category.single'
]);
Route::get('/tag/{id}', [
    'uses' => 'FrontendController@tag',
    'as' => 'tag.single'
]);
});

Route::get('/test',function(){

    return App\Profile::find(1)->user;
});



