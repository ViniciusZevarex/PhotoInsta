<?php


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

//posts
Route::get('/posts','PostsController@index')->name('show_posts');
Route::get('/posts/create','PostsController@create')->name('CreatePosts');
Route::post('/posts','PostsController@store')->name('store_posts');

//user
Route::post('/user/profile/edit','UserController@uploadProfile')->name('store_profile_img');
Route::get('/user/list','UserController@listUsers')->name('list_users');
Route::get('/posts/user/profile','UserController@showProfile')->name('user_profile');

//seguidores
Route::get('/seguir/user/','UserController@seguir')->name('seguir_user');
Route::get('/deixar-de-seguir/user/','UserController@deixarDeSeguir')->name('deixar_seguir_user');

//like
Route::get('/like','LikesController@like')->name('like');
Route::get('/unlike','LikesController@unlike')->name('unlike');

Route::resource('notifications', 'NotificationController'); 
