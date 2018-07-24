<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\ContentTypeRepository;
use Carbon\Carbon;

class ContentTypeService
{
    public function repo()
    {
        return app(ContentTypeRepository::class);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'name' => 'string', 
            'display_name' => 'string',
            'type' => [ new AbsentRule() ],
            'school_id' => [ new AbsentRule() ]
        ]);

        return $this->repo()->update($id, $opts);
    }
}