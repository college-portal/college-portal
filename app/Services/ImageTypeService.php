<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\ImageTypeRepository;
use Carbon\Carbon;

class ImageTypeService
{
    public function repo()
    {
        return app(ImageTypeRepository::class);
    }

    protected function validate ($opts = null) {
        return request()->validate($opts ?? [
            'type' => 'string',
            'name' => 'string',
            'school_id' => [ new AbsentRule() ]
        ]);
    }

    public function update (int $id, $opts = []) {
        $this->validate();
        return $this->repo()->update($id, $opts);
    }
}