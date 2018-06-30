<?php

namespace App\Services;

use App\Repositories\StaffRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\DepartmentRepository;
use App\Rules\AbsentRule;
use Carbon\Carbon;

class StaffService extends BaseService
{
    private $schoolRepository, $departmentRepository;

    public function __construct(SchoolRepository $schoolRepository, DepartmentRepository $departmentRepository) {
        $this->schoolRepository = $schoolRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function repo()
    {
        return app(StaffRepository::class);
    }

    public function update($id, $opts = []) {
        $user = auth()->user()->first();
        
        request()->validate([
            'user_id' => [ new AbsentRule() ],
            'school_id' => 'numeric|exists:schools,id',
            'title' => 'string',
            'department_id' => 'numeric|nullable|exists:departments,id'
        ]);

        $staff = $this->repo()->single($id);
        $user->authorize('update', $staff);

        if (isset($opts['school_id'])) {
            $school = $this->schoolRepository->school($user, $opts['school_id']);
            $user->authorize('update', $school);
        }

        if (isset($opts['department_id'])) {
            $department = $this->departmentRepository->department($opts['department_id']);
            $user->authorize('update', $department);
        }

        return $this->repo()->update($id, $opts);
    }
}