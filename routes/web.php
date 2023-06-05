<?php

use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'App\Http\Controllers\Main\IndexController');
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix'=> 'personal', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/', 'Main\PersonalController@ShowDashboard')->name('personal.main.index');

    Route::prefix('/liked')->namespace('Liked')->group(function () {
        Route::get('/', 'LikedController@LikedPost')->name('personal.liked.index');
        Route::delete('/{post}', 'DeleteController@DeletePost')->name('personal.liked.delete');
    });

    Route::prefix('/comment')->namespace('Comment')->group(function () {
        Route::get('/', 'CommentController@ShowComment')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController@EditComment')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController@UpdateComment')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController@DeleteComment')->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix'=> 'admin', 'middleware' => ['auth', 'admin', 'verified']], function() {
    Route::get('/', 'Main\AdminController@ShowDashboard')->name('admin.main.index');

    Route::prefix('/posts')->namespace('Post')-> group (function() {
        Route::get('/', 'PostIndexController@IndexPost')->name('admin.post.index');
        Route::get('/create', 'CreateController@CreatePost')->name('admin.post.create');
        Route::post('/', 'StoreController@StorePost')->name('admin.post.store');
        Route::get('/{post}', 'ShowController@ShowPost')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController@EditPost')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController@UpdatePost')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController@DeletePost')->name('admin.post.delete');
    });

    Route::prefix('/categories')->namespace('Comment')-> group (function() {
        Route::get('/', 'CategoryIndexController@IndexCategory')->name('admin.category.index');
        Route::get('/create', 'CreateController@CreateCategory')->name('admin.category.create');
        Route::post('/', 'StoreController@StoreCategory')->name('admin.category.store');
        Route::get('/{category}', 'ShowController@ShowCategory')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController@EditCategory')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController@UpdateCategory')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController@DeleteCategory')->name('admin.category.delete');
    });

    Route::prefix('/tags')->namespace('Tag')-> group (function() {
        Route::get('/', 'TagIndexController@IndexTag')->name('admin.tag.index');
        Route::get('/create', 'CreateController@CreateTag')->name('admin.tag.create');
        Route::post('/', 'StoreController@StoreTag')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController@ShowTag')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'EditController@EditTag')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController@UpdateTag')->name('admin.tag.update');
        Route::delete('/{tag}', 'DeleteController@DeleteTag')->name('admin.tag.delete');
    });

    Route::prefix('/users')->namespace('User')-> group (function() {
        Route::get('/', 'UserIndexController@IndexUser')->name('admin.user.index');
        Route::get('/create', 'CreateController@CreateUser')->name('admin.user.create');
        Route::post('/', 'StoreController@StoreUser')->name('admin.user.store');
        Route::get('/{user}', 'ShowController@ShowUser')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController@EditUser')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController@UpdateUser')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController@DeleteUser')->name('admin.user.delete');
    });

});

    /* Route::prefix('/admin')->namespace('App\Http\Controllers\Admin\Comment')-> group (function(){
        Route::get('/categories','CategoryIndexController@ShowCategory');
}); */

Auth::routes(['verify' => true]);

