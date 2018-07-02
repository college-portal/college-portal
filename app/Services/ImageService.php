<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\ImageTypeRepository;
use App\Rules\AbsentRule;
use Carbon\Carbon;

class ImageService
{
    private $imageTypeRepository;

    public function __construct(ImageTypeRepository $imageTypeRepository) {
        $this->imageTypeRepository = $imageTypeRepository;
    }

    public function repo()
    {
        return app(ImageRepository::class);
    }

    protected function validate ($opts = null) {
        return request()->validate($opts ?? [
            'owner_id' => [ new AbsentRule() ],
            'image_type_id' => [ new AbsentRule() ],
            'location' => 'string',
            'file' => 'image'
        ]);
    }

    public function create($opts) {
        $owner_id = $opts['owner_id'];
        $image_type_id = $opts['image_type_id'];

        $user = auth()->user()->first();

        $imageType = $this->imageTypeRepository->single($image_type_id);

        $owner = $imageType->owner($owner_id)->first();

        $user->authorize('update', $owner);

        return $this->repo()->create($opts);
    }

    public function update($id, $opts = []) {
        $this->validate();

        return $this->repo()->update($id, $opts);
    }
}