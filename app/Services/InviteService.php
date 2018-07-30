<?php

namespace App\Services;


use Carbon\Carbon;
use App\Mail\InviteMail;
use App\Models\InviteRole;

use Illuminate\Support\Collection;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTFactory;
use App\Repositories\InviteRepository;
use Illuminate\Validation\ValidationException;


class InviteService
{
    public function repo()
    {
        return app(InviteRepository::class);
    }

    public function create($opts) {
        $invite = $this->repo()->create($opts);

        if (isset($opts['role_id'])) {
            $role_id = $opts['role_id'];
            $invite->roles()->create([
                'role_id' => $role_id
            ]);
        }
        else if (isset($opts['roles'])) {
            $roleIds = new Collection($opts['roles']);
            $roleIds->map(function ($data) use ($invite) {
                $invite->roles()->create([
                    'role_id' => $data['role_id'],
                    'extras' => isset($data['extras']) ? $data['extras'] : null
                ]);
            });
        }
        else {
            throw ValidationException::withMessages([
                'role_id' => 'should exist if "roles" are absent"',
                'roles' => 'should exist if "role_id" is absent"'
            ]);
        }
        $invite->load('roles');
        $this->sendMail($invite);
        return $invite;
    }


    //sends new invite mail
    function sendMail($invite) {
       
        $id = $invite['id'];
        $email = $invite['email'];
        $message = $invite['message'];

        //create jwt with aud to prevent interferance with authentication
        $payload = JWTFactory::sub($id)->aud('invite')->make();
        $token = JWTAuth::encode($payload);
        $link =  url("/api/v1/invites/{$token}");
        
        return Mail::to($email)->send(new InviteMail(['message' => $message,'link'=>$link]));
    }
}