<?php

use Illuminate\Support\Facades\Route;

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'App\Http\Controllers\Main\IndexController');
});


Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')-> group (function() {
    Route::get('/', 'Main\AdminController@ShowDashboard');

    Route::prefix('/posts')->namespace('Post')-> group (function() {
        Route::get('/', 'PostIndexController@IndexPost')->name('admin.post.index');
        Route::get('/create', 'CreateController@CreatePost')->name('admin.post.create');
        Route::post('/', 'StoreController@StorePost')->name('admin.post.store');
        Route::get('/{post}', 'ShowController@ShowPost')->name('admin.post.show');
        Route::get('/{post}/edit', 'EditController@EditPost')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController@UpdatePost')->name('admin.post.update');
        Route::delete('/{post}', 'DeleteController@DeletePost')->name('admin.post.delete');
    });

    Route::prefix('/categories')->namespace('Category')-> group (function() {
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

});

    /* Route::prefix('/admin')->namespace('App\Http\Controllers\Admin\Category')-> group (function(){
        Route::get('/categories','CategoryIndexController@ShowCategory');
}); */

Auth::routes();

