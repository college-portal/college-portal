<?php

namespace App\Services;

use App\Repositories\SchoolRepository;
use App\Repositories\StaffRepository;
use Carbon\Carbon;

class SchoolService extends BaseService
{
    private $staffRepository;

    public function __construct(StaffRepository $staffRepository) {
        $this->staffRepository = $staffRepository;
    }

    public function repo()
    {
        return app(SchoolRepository::class);
    }

    public function create($opts) {
        $school = $this->repo()->create($opts);
        if (isset($opts['staff_title'])) {
            $school->staff = $this->staffRepository->create([
                'user_id' => $opts['owner_id'],
                'school_id' => $school->id,
                'title' => $opts['staff_title']
            ]);
        }
        return $school;
    }
}