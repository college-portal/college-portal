<?php

namespace App\Services;

use App\Models\Semester;
use App\Repositories\SemesterTypeRepository;
use App\Repositories\SemesterRepository;
use App\Repositories\SessionRepository;
use App\Models\Session;
use Carbon\Carbon;
use Exception;

class SemesterService extends BaseService
{
    protected $semesterTypeRepository, $sessionRepository;

    public function __construct(SemesterTypeRepository $semesterTypeRepository, SessionRepository $sessionRepository) {
        $this->semesterTypeRepository = $semesterTypeRepository;
        $this->sessionRepository = $sessionRepository;
    }

    public function repo()
    {
        return app(SemesterRepository::class);
    }

    /** 
     * check that the start_date < end_date and that the start_date and end_date are 
     * within (between) the session's start_date and end_date values
     * 
     * @param Session $session
     * @param Carbon $start_date
     * @param Carbon $end_date
     * 
     * @throws Exception
     */
    public function validateSemesterDates(Session $session, Carbon $start_date, Carbon $end_date) {
        if (!(($start_date < $end_date) &&
            ($start_date >= $session->start_date && $end_date <= $session->end_date))) {
            throw new Exception("Invalid Semester Interval Dates. Input dates ($start_date and $end_date) should be within ($session->start_date and $session->end_date)");
        }
    }

    /**
     * attempts to create a new Semester
     * 
     * @param array $opts
     * @param integer $opts->session_id
     * @param integer $opts->semester_type_id
     * @param Carbon $opts->start_date
     * @param Carbon $opts->end_date
     * 
     * @return \App\Models\Semester
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create($opts) {
        /** retrieve the necessary variables from the request input */

        $session_id = isset($opts['session_id']) ? $opts['session_id'] : null;
        $semester_type_id = $opts['semester_type_id'];
        $start_date = Carbon::parse($opts['start_date']);
        $end_date = Carbon::parse($opts['end_date']);

        /** retrieve the school, so we can verify that it has a current session */

        $school = $this->semesterTypeRepository->type($semester_type_id)->school()->first();

        /** verify that a current session exists in the school to add the semester to */

        $session = $session_id ? $this->sessionRepository->session($session_id) : $school->currentSession()->first();

        if (!$session) throw new Exception('No current session exists to add this semester to');
        
        /** verify that the semester's date interval is within its session's */

        $this->validateSemesterDates($session, $start_date, $end_date);

        /** create the semester */
        
        $opts = array_merge($opts, [ 'session_id' => $session->id ]);
        return $this->repo()->create($opts);
    }

    /**
     * attempts to update an existing Semester
     * 
     * @param integer $id
     * @param array $opts
     * @param integer $opts->session_id
     * @param integer $opts->semester_type_id
     * @param Carbon $opts->start_date
     * @param Carbon $opts->end_date
     * 
     * @return \App\Models\Semester
     *
     * @throws Exception
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update($id, $opts) {
        $user = auth()->user()->first();
        $semester = $this->repo()->semester($id);
        $session = null;

        /** retrieve the necessary variables from the request input */

        $session_id = isset($opts['session_id']) ? $opts['session_id'] : null;
        $semester_type_id = isset($opts['semester_type_id']) ? $opts['semester_type_id'] : null;
        $start_date = (isset($opts['start_date']) ? Carbon::parse($opts['start_date']) : null);
        $end_date = (isset($opts['end_date']) ? Carbon::parse($opts['end_date']) : null);


        /** confirm that the user can update the session */
        if ($session_id) {
            $session = $this->sessionRepository->session($session_id);

            $user->authorize('update', $session);

            $start_date = Carbon::parse($start_date ?? $semester->start_date);
            $end_date = Carbon::parse($end_date ?? $semester->end_date);

            $this->validateSemesterDates($session, $start_date, $end_date);
        }

        /** confirm that the user can update the semester_type */
        if ($semester_type_id) {
            $type = $this->semesterTypeRepository->type($semester_type_id);

            $user->authorize('update', $type);
        }

        /** confirm that the selected dates pass the test */
        if ($start_date || $end_date) {
            $start_date = Carbon::parse($start_date ?? $semester->start_date);
            $end_date = Carbon::parse($end_date ?? $semester->end_date);

            $session = $session ?? $semester->session()->first();

            $this->validateSemesterDates($session, $start_date, $end_date);
        }

        /** update the semester */
        return $this->repo()->update($id, $opts);
    }
}