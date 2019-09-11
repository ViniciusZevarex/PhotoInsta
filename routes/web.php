<?php


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::get('/posts','PostsController@index')->name('show_posts');

Route::get('/posts/create','PostsController@create')->name('CreatePosts');

Route::post('/posts','PostsController@store')->name('store_posts');

Route::get('/like','PostsController@like')->name('like');

Route::get('/posts/user/profile','PostsController@showProfile')->name('user_profile');

Route::resource('notifications', 'NotificationController');