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
Route::resource('post','PostsController');
Route::resource('category','CategoryController');
Route::resource('contact','ContactController');
Route::resource('photo','PhotoController');
//Routes for user page 
Route::get('/','PageController@index')->name('home');
Route::get('/about','PageController@about')->name('about');
Route::get('/post/getpost/{id}','PageController@getPost')->name('post.show');
//Routes for posts
Route::get('/post/edit/{id}','PostsController@show')->name('post.edit');
Route::get('/post/album/{id}','PhotoController@show')->name('post.album');
Route::get('/post/delete/{id}','PostsController@destroy')->name('post.delete');
Route::post('/post/create','PostsController@store')->name('post.add');
Route::post('/post/update','PostsController@update')->name('post.update');
//Routes for categories
Route::get('/category','CategoryController@create')->name('category.show');
Route::get('/category/edit/{id}','CategoryController@edit')->name('category.edit');
Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
Route::post('/category/create','CategoryController@store')->name('category.add');
Route::post('/category/update','CategoryController@update')->name('category.update');
//Routes for photo
Route::get('/photo/add/{id}','PhotoController@create')->name('photo.upload');
Route::post('/photo/add','PhotoController@store')->name('photo.add');
Route::get('/photo/delete/{id}','PhotoController@destroy')->name('photo.delete');
//Routes for contact
Route::get('/contact','ContactController@index')->name('contact.show');
Route::get('/contact/delete/{id}','ContactController@destroy')->name('contact.destroy');
Route::post('/contact/add','ContactController@store')->name('contact.add');
//Routes for admin page
Route::get('/home','HomeController@index')->name('home');
Auth::routes();

