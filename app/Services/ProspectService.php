<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\ProspectRepository;
use Carbon\Carbon;

class ProspectService
{
    public function repo()
    {
        return app(ProspectRepository::class);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'user_id' => [ new AbsentRule() ],
            'school_id' => [ new AbsentRule() ],
            'program_id' => [ new AbsentRule() ],
            'session_id' => [ new AbsentRule() ],
            'locked_at' => [ new AbsentRule() ],
            'accepted_at' => [ new AbsentRule() ],
            'is_locked' => 'boolean',
            'is_accepted' => 'boolean'
        ]);

        $is_locked = isset($opts['is_locked']) && ($opts['is_locked'] !== false);
        $is_accepted = isset($opts['is_accepted']) && ($opts['is_accepted'] !== false);

        $locked_data = isset($opts['is_locked']) ? [ 'locked_at' => $is_locked ? Carbon::now() : null ] : [];
        $accepted_data = isset($opts['is_accepted']) ? [ 'accepted_at' => $is_accepted ? Carbon::now() : null ] : [];

        return $this->repo()->update($id, array_merge($opts, $locked_data, $accepted_data));
    }
}