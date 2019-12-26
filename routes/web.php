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

Route::get('/', 'HelloController@index');

// Hello controller method
Route::get('about/us', 'HelloController@about')->name('about');
Route::get('contact/us', 'HelloController@contact')->name('contact');


// Category controller method
Route::get('add/Category', 'CategoryController@add_cat')->name('add_category');
Route::get('show/Category', 'CategoryController@show_cat')->name('show_cat');

// add
Route::post('strore/Category', 'CategoryController@store_category')->name('store_category');
// view
Route::get('single_cat_view/{id}', 'CategoryController@single_cat_view');
// delete
Route::get('single_cat_delete/{id}', 'CategoryController@single_cat_delete');

// edit
Route::get('single_cat_edit/{id}', 'CategoryController@single_cat_edit');
// update
Route::post('update_category/{id}', 'CategoryController@update_category');


// Post crud are here
Route::get('add_post_page', 'PostController@add_post_page')->name('add_post_page');
Route::post('add_post', 'PostController@add_post')->name('add_post');
Route::get('show_post', 'PostController@show_post')->name('show_post');
Route::get('single_post_view/{id}', 'PostController@single_post_view');
Route::get('single_post_edit/{id}', 'PostController@single_post_edit');
Route::post('update_post/{id}', 'PostController@update_post');
Route::get('single_post_delete/{id}', 'PostController@single_post_delete');