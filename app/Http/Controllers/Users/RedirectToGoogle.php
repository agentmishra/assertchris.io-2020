<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Socialite;

class RedirectToGoogle extends Controller
{
    public function handle()
    {
        return Socialite::driver('google')->redirect();
    }
}
