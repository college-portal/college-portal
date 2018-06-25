<?php

namespace App\Services;

use App\Repositories\ChargeableRepository;
use App\Repositories\ChargeableServiceRepository;

/**
 * A service class for two repositories
 */
class ChargeableService extends BaseService
{
    public function repo()
    {
        return app(ChargeableRepository::class);
    }

    public function serviceRepo()
    {
        return app(ChargeableServiceRepository::class);
    }

    /**
     * attempts to create a new Chargeable
     * 
     * @param array $opts
     * @param integer $opts->chargeable_service_id
     * @param float $opts->amount
     * 
     * @return \App\Models\Chargeable
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create($opts) {
        $chargeable_service_id = $opts['chargeable_service_id'];

        $service = $this->serviceRepo()->single($chargeable_service_id);

        /**
         * it's not important to authorize the user for the chargeable-service here, as 
         * this has already been taken care of in the App\Http\Requests\ChargeableRequest class
         */

        return $this->repo()->create(array_merge([ 'amount' => $service->amount ], $opts));
    }

    /**
     * attempts to update the details of a Chargeable
     * 
     * @param integer $id
     * @param array $opts
     * @param integer $opts->chargeable_service_id
     * @param integer $opts->owner_id
     * @param float $opts->amount
     * 
     * @return \App\Models\Chargeable
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($id, $opts) {
        $user = auth()->user()->first();
        $owner_id = isset($opts['owner_id']) ? $opts['owner_id'] : null;
        $chargeable_service_id = isset($opts['chargeable_service_id']) ? $opts['chargeable_service_id'] : null;

        if ($chargeable_service_id) {
            $service = $this->serviceRepo()->single($chargeable_service_id);

            $user->authorize('update', $service);
        }

        if ($owner_id) {
            $owner = $service->owner($owner_id);

            $user->authorize('update', $owner);
        }

        return $this->repo()->update($id, $opts);
    }
}