<?php

namespace App\Services;

use App\Repositories\ProgramRepository;
use App\Repositories\SemesterRepository;
use App\Repositories\LevelRepository;
use App\Repositories\ProgramCreditRepository;
use Carbon\Carbon;

class ProgramCreditService extends BaseService
{
    private $programRepository, $semesterRepository, $levelRepository;

    public function __construct(ProgramRepository $programRepository,
                                SemesterRepository $semesterRepository,
                                LevelRepository $levelRepository) {
        $this->programRepository = $programRepository;
        $this->semesterRepository = $semesterRepository;
        $this->levelRepository = $levelRepository;
    }

    /**
     * @return \App\Repositories\ProgramCreditRepository
     */
    public function repo()
    {
        return app(ProgramCreditRepository::class);
    }

    /**
     * attempts to update the details of a ProgramCredit
     * 
     * @param integer $id
     * @param array $opts
     * @param integer $opts->program_id
     * @param integer $opts->semester_id
     * @param float $opts->level_id
     * 
     * @return \CollegePortal\Models\ProgramCredit
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($id, $opts = []) {
        $user = auth()->user()->first();
        $credit = $this->repo()->single($id);

        $program_id = isset($opts['program_id']) ? $opts['program_id'] : null;
        $semester_id = isset($opts['semester_id']) ? $opts['semester_id'] : null;
        $level_id = isset($opts['level_id']) ? $opts['level_id'] : null;

        if ($program_id) {
            $program = $this->programRepository->program($program_id);

            $user->authorize('update', $program);
        }
        if ($semester_id) {
            $semester = $this->semesterRepository->semester($semester_id);

            $user->authorize('update', $semester);
        }
        if ($level_id) {
            $level = $this->levelRepository->level($level_id);

            $user->authorize('update', $level);
        }

        return $this->repo()->update($id, $opts);
    }
}