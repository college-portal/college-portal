<?php

namespace App\Services;

use App\Rules\AbsentRule;
use App\Repositories\GradeRepository;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class GradeService
{
    public function repo()
    {
        return app(GradeRepository::class);
    }

    protected function validate($opts = null) {
        return request()->validate($opts ?? [
            'student_takes_course_id' => [ new AbsentRule() ],
            'score' => 'numeric',
            'description' => 'string'
        ]);
    }

    public function create($opts) {
        $student_takes_course_id = $opts['student_takes_course_id'];
        $score = (float)$opts['score'];

        // make sure the total score does not exceed 100
        $totalScore = $this->repo()->total($student_takes_course_id) + $score;
        if ($totalScore > 100) {
            throw ValidationException::withMessages([
                'score' => "total score should not exceed 100"
            ]);
        }
        return $this->repo()->create($opts);
    }

    public function update($id, $opts = []) {
        $this->validate();

        $grade = $this->repo()->single($id);

        if (isset($opts['score'])) {
            $score = (float)$opts['score'];
            // make sure the new total score does not exceed 100
            $totalScore = ($grade->total() - $grade->score) + $score;
            if ($totalScore > 100) {
                throw ValidationException::withMessages([
                    'score' => "total score should not exceed 100"
                ]);
            }
        }
        
        return $this->repo()->update($id, $opts);
    }
}