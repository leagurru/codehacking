<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('post/{id}', ['as'=>'home.post', 'uses'=> 'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){
        return view('admin.index');
    });

    Route::resource('admin/users','AdminUsersController',['names'=>[
        'index'  => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit'

    ]]);

    Route::get('post/{id}', ['as'=>'home.post', 'uses'=> 'AdminPostsController@post']);


    Route::resource('admin/posts','AdminPostsController',['names'=>[
        'index'  => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit'

    ]]);


    Route::resource('admin/categories','AdminCategoriesController',['names'=>[
        'index'  => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit'
    ]]);


    Route::resource('admin/media','AdminMediasController',['names'=>[
        'index'  => 'admin.media.index',
        'create' => 'admin.media.create',
        'store' => 'admin.media.store',
        'edit' => 'admin.media.edit'
    ]]);

    Route::delete('admin/delete/media','AdminMediasController@deleteMedia');


    Route::resource('admin/comments','PostCommentsController',['names'=>[
        'index'  => 'admin.comments.index',
        'show'  => 'admin.comments.show',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit'
    ]]);



    Route::resource('admin/comment/replies','CommentRepliesController',['names'=>[
        'index'  => 'admin.comment.replies.index',
        'show'  => 'admin.comment.replies.show',
        'create' => 'admin.comment.replies.create',
        'store' => 'admin.comment.replies.store',
        'edit' => 'admin.comment.replies.edit'
    ]]);


    //Route::get('admin/media/upload', ['as'=> 'admin.media.upload', 'uses'=> 'AdminMediasController@store']);
});
