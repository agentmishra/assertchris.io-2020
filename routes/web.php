<?php

use App\Http\Controllers\Admin\Posts\CreatePost;
use App\Http\Controllers\Admin\Posts\EditPost;
use App\Http\Controllers\Admin\Posts\ForgetPost;
use App\Http\Controllers\Admin\Posts\ViewPosts;
use App\Http\Controllers\ShowHome;
use App\Http\Controllers\Posts\ViewPost;
use App\Http\Controllers\Users\RedirectToGoogle;
use App\Http\Controllers\Users\HandleGoogleCallback;
use App\Models\Post;

Route::get('/', [ShowHome::class, 'handle'])->name('show-home');

Route::feeds();

Route::prefix('/admin')->namespace('Admin\\')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('/posts')->namespace('Posts\\')->name('posts.')->group(function() {
        Route::get('/', [ViewPosts::class, 'handle'])->name('view-posts');
        Route::get('/create', [CreatePost::class, 'handle'])->name('create-post');
        Route::get('/{post}/edit', [EditPost::class, 'handle'])->name('edit-post');
        Route::get('/{post}/forget', [ForgetPost::class, 'handle'])->name('forget-post');
    });
});

Route::prefix('/posts')->namespace('Posts\\')->name('posts.')->group(function() {
    Route::get('/{post}', [ViewPost::class, 'handle'])->name('view-post');
});

Route::get('/users/redirect-to-google', [RedirectToGoogle::class, 'handle'])->name('users.redirect-to-google');
Route::get('/users/handle-google-callback', [HandleGoogleCallback::class, 'handle'])->name('users.handle-google-callback');

// redirects ↓

Route::get('/post/{post}', function(Post $post) {
    return redirect()->route('posts.view-post', $post);
});


// debugging ↓

Route::get('/wealth-check/parent', function() {
    return <<<EOT
        <iframe src="/wealth-check/child" width="500px" height="250px"></iframe>
        <script>
            window.addEventListener('message', function(e) {
                var parts = e.data.split('|')

                if (parts[0] == 'wealth-challenge-submission-success') {
                    window.location.href = `https://www.development.indief.in/wealth-check/intro#id=\${parts[1]}`
                }
            })
        </script>
    EOT;
});

Route::get('/wealth-check/child', function() {
    return <<<EOT
        <button>submit</button>
        <div></div>
        <script>
            var button = document.querySelector('button')
            var redirecting = document.querySelector('div')

            button.addEventListener('click', function(e) {
                var seconds = 5

                var handle = setInterval(function() {
                    redirecting.innerHTML = `Redirecting in \${seconds}...`

                    seconds--

                    if (seconds < 0) {
                        window.parent.postMessage('wealth-challenge-submission-success|123-456', '*')
                        clearTimeout(handle)
                    }
                }, 1000)
            })
        </script>
    EOT;
});
