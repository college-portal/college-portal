<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Models\ContentType;
use App\Repositories\ContentTypeRepository;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class ContentTypeService
{
    public function repo()
    {
        return app(ContentTypeRepository::class);
    }

    public function create ($opts) {
        if (isset($opts['related_to'])) {
            $parent = $this->repo()->single($opts['related_to']);
            if (!$parent) {
                throw ValidationException::withMessages([
                    'related_to' => 'an equivalent content_type does not exist'
                ]);
            }
            if ($parent->format != ContentType::OBJECT) {
                throw ValidationException::withMessages([
                    'related_to' => 'only content_type with format "object" can have children'
                ]);
            }
            $opts = array_merge($opts, [ 'type' => $parent->type ]);
        }
        return $this->repo()->create($opts);
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