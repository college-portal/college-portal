<?php

namespace App\Services;

use App\Repositories\IntentRepository;
use App\Repositories\IntentTypeRepository;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class IntentService
{
    protected $intentTypeRepository;

    public function __construct(IntentTypeRepository $intentTypeRepository) {
        $this->intentTypeRepository = $intentTypeRepository;
    }

    public function repo()
    {
        return app(IntentRepository::class);
    }

    public function create($opts) {
        $intent_type = isset($opts['intent_type']) ? $opts['intent_type'] : null;
        $intent_type_id = isset($opts['intent_type_id']) ? $opts['intent_type_id'] : null;

        if (!$intent_type && !$intent_type_id) {
            throw ValidationException::withMessages([
                'intent_type' => 'either this or intent_type_id is required',
                'intent_type_id' => 'either this or intent_type is required'
            ]);
        }
        else if ($intent_type) {
            if ($intent = $this->intentTypeRepository->model()->where('name', $intent_type)->first()) {
                $intent_type_id = $intent->id;
            }
        }

        return $this->repo()->create(array_merge($opts, [ 'intent_type_id' => $intent_type_id ]));
    }
}