<?php

namespace App\Services;

use App\Models\ContentType;
use App\Repositories\ContentRepository;
use App\Repositories\ContentTypeRepository;
use Illuminate\Validation\ValidationException;
use App\Rules\AbsentRule;
use Carbon\Carbon;

class ContentService
{
    private $contentTypeRepository;

    public function __construct(ContentTypeRepository $contentTypeRepository) {
        $this->contentTypeRepository = $contentTypeRepository;
    }

    public function repo()
    {
        return app(ContentRepository::class);
    }

    public function create ($opts) {
        $value = $opts['value'];
        $type = $this->contentTypeRepository->single($opts['content_type_id']);
        if (($type->format($value) != $type->format) && ($type->format != ContentType::ARRAY)) {
            throw ValidationException::withMessages([
                'value' => "format of $value does not match $type->format"
            ]);
        }
        if (($type->format == ContentType::ARRAY) && $this->repo()->model()->where('content_type_id', $type->id)->where('value', $value)->exists()) {
            throw ValidationException::withMessages([
                'value' => "content with value of $value already exists for type $type->name belonging to $type->type"
            ]);
        }
        return $this->repo()->create($opts);
    }

    public function update ($id, $opts = []) {
        request()->validate([
            'value' => 'string',
            'owner_id' => [ new AbsentRule() ],
            'content_type_id' => [ new AbsentRule() ]
        ]);

        return $this->repo()->update($id, $opts);
    }
}