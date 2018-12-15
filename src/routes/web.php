<?php
/**
 * Created by PhpStorm.
 * User: neelam
 * Date: 8/12/18
 * Time: 4:32 PM
 */

Route::get('/', 'PostController@getIndex')->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/author/post', 'HomeController@getPostForm')->name('post.form');
Route::post('/author/post', 'HomeController@createPost')->name('post.form');
Route::get('/author/post/detail/{id}', 'HomeController@getPost')->name('post.detail');
Route::get('/author/post/edit/{id}', 'HomeController@editPost')->name('post.edit');
Route::post('/author/post/edit/{id}', 'HomeController@updatePost')->name('post.update');
Route::get('/author/post/delete/{id}', 'HomeController@deletePost')->name('post.delete');
Route::get('/post/read/{post_id}', 'PostController@getFullPost')->name('post.read');
