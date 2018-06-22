<?php

namespace App\Services;

use App\Repositories\ChargeableRepository;
use App\Repositories\ChargeableServiceRepository;
use Carbon\Carbon;

class ChargeableService
{
    public function repo()
    {
        return app(ChargeableRepository::class);
    }

    public function serviceRepo()
    {
        return app(ChargeableServiceRepository::class);
    }

    public function create($opts) {
        $chargeable_service_id = $opts['chargeable_service_id'];

        $service = $this->serviceRepo()->single($chargeable_service_id);

        return $this->repo()->create(array_merge([ 'amount' => $service->amount ], $opts));
    }

    public function update($opts) {
        $user = auth()->user()->first();
        $chargeable_id = isset($opts['chargeable_id']) ? $opts['chargeable_id'] : null;
        $chargeable_service_id = isset($opts['chargeable_service_id']) ? $opts['chargeable_service_id'] : null;

        if ($chargeable_service_id) {
            $service = $this->serviceRepo()->single($chargeable_service_id);

            $user->authorize('update', $service);
        }

        if ($chargeable_id) {
            $owner = $service->owner($chargeable_id);

            $user->authorize('update', $owner);
        }

        return $this->repo()->update($opts);
    }
}