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

Route::get('/','PageController@index');
//SendMail
Route::get('/contact','PageController@getContact');
Route::post('/contact', 'PageController@postContact');
//
Route::get('/blog','PageController@blog');
Route::resource('post','PostController');
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::resource('categories','CategoryController' ,['except'=> ['create']]);
Auth::routes();
Route::resource('register', 'Auth\RegisterController@register', ['except'=> ['create']]);
//Route::resource('queries', 'QueryController');

