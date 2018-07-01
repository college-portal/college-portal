<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\GradeTypeRepository;
use Carbon\Carbon;

class GradeTypeService
{
    public function repo()
    {
        return app(GradeTypeRepository::class);
    }

    protected function validate ($opts = null) {
        return request()->validate($opts ?? [
            'name' => 'string',
            'value' => 'numeric|min:0|max:100',
            'minimum' => 'numeric|min:0|max:100',
            'maximum' => 'numeric|min:0|max:100',
            'school_id' => [ new AbsentRule() ]
        ]);
    }

    public function update (int $id, $opts = []) {
        $this->validate();
        return $this->repo()->update($id, $opts);
    }
}