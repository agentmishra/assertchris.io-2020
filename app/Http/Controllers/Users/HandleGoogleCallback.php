<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;

class HandleGoogleCallback extends Controller
{
    public function handle()
    {
        $user = Socialite::driver('google')->user();

        if (!$user) {
            abort(500);
        }

        $account = User::where('email', $user->email)->first();

        if (!$account) {
            abort(401);
        }

        app('auth')->login($account);

        return redirect()->route('admin.posts.view-posts');
    }
}
