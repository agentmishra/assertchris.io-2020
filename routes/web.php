<?php

use App\Http\Controllers\ShowHome;
use App\Models\Post;

Route::get('/', [ShowHome::class, 'handle'])->name('show-home');

Route::prefix('/admin')->namespace('Admin\\')->name('admin.')->group(function() {
    Route::prefix('/posts')->namespace('Posts\\')->name('posts.')->group(function() {
        Route::get('/', 'ViewPosts@handle');
        Route::get('/{post}/edit', 'EditPost@handle')->name('edit-post');
    });
});

Route::prefix('/posts')->namespace('Posts\\')->name('posts.')->group(function() {
    Route::get('/{post}', 'ViewPost@handle')->name('view-post');
});

// redirects ↓

Route::get('/post/{post}', function (Post $post) {
    return redirect()->route('posts.view-post', $post);
});
