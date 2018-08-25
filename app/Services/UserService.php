<?php

namespace App\Services;

use CollegePortal\Models\User;
use CollegePortal\Models\Intent;
use App\Repositories\UserRepository;
use App\Mail\UserVerificationMail;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;

class UserService extends BaseService
{
    public const AUD_RESEND_VERIFICATION = "resend-verification";
    public const AUD_VERIFICATION = "verification";
    public const AUD_ACCESS = "access";

    protected $intentService;

    public function __construct(IntentService $intentService) {
        $this->intentService = $intentService;
    }

    public function repo()
    {
        return app(UserRepository::class);
    }

    public function updateGoogleId(User $user, string $googleId) {
        $user->google_id = $googleId;
        $user->save();
        return $user;
    }

    public function createFromGoogle($googleUser) {
        $user = new User();

        $names = explode(' ', $googleUser->name);
        if (isset($names[0])) $user->first_name = $names[0];
        if (isset($names[1])) $user->last_name = $names[1];
        if (isset($names[2])) $user->other_names = $names[2];

        $user->email = $googleUser->email;
        $user->google_id = $googleUser->id;
        $user->password = md5(rand(1,10000));

        $user->save();

        $this->intentService->register($user, Intent::CHANGE_PASSWORD);

        return $user;
    }

    public function create($opts) {
        $user = $this->repo()->create($opts);
        $this->sendVerificationMail($user);
        return $user;
    }

    public function sendVerificationMail(User $user) {
        //create jwt with aud to prevent interferance with authentication
        $payload = JWTFactory::sub($user->id)->aud(self::AUD_VERIFICATION)->ttl(null)->make();
        $token = JWTAuth::encode($payload)->get();
        $link = url("/api/v1/auth/verify?t={$token}");
        Mail::to($user->email)->send(new UserVerificationMail(['name' => $user->display_name, 'link' => $link]));
    }
}