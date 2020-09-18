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

Route::redirect('/', 'blog');

Auth::routes();

Route::get('blog', 'Web\PageController@blog')->name('blog');

//web
Route::get('/post/{slug}', 'Web\PageController@post')->name('post');
Route::get('/category/{slug}', 'Web\PageController@category')->name('category');
Route::get('/tag/{slug}', 'Web\PageController@tag')->name('tag');

//admin
Route::resource('tags', 	  'Admin\TagController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('posts',	  'Admin\PostController');
Route::post('/comments/store',	  'Admin\CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

// Admin Users, Roles, Permission resource route.
Route::resource('users', 'Admin\UserController');
Route::resource('roles', 'Admin\RoleController');
Route::resource('permissions', 'Admin\PermissionController');

// Para marcar como leidos las notificaciones
Route::get('/markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
});
