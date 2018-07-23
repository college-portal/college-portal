<?php

namespace App\Services;

use App\Repositories\ContentRepository;
use App\Rules\AbsentRule;
use Carbon\Carbon;

class ContentService
{
    public function repo()
    {
        return app(ContentRepository::class);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'value' => 'string',
            'owner_id' => [ new AbsentRule() ],
            'content_type_id' => [ new AbsentRule() ],
            'created_at' => [ new AbsentRule() ],
            'updated_at' => [ new AbsentRule() ]
        ]);

        return $this->repo()->update($id, $opts);
    }
}