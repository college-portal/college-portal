<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\UserService;
use App\User;
use Auth;
use Socialite;

class AuthGoogleController extends Controller
{
    protected $service;

    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function service() {
        return $this->service;
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $existingUser = $this->service()->repo()->userByEmail($googleUser->email);

        if($existingUser) {
            $user = $this->service()->updateGoogleId($existingUser, $googleUser->google_id);
            Auth::loginUsingId($existingUser->id);
        }
        else {
            $user = $this->service()->createFromGoogle($googleUser);
            Auth::loginUsingId($user->id);
        }
        return redirect()->to('/home');
    }
}
