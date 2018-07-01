<?php

namespace App\Services;

use App\Repositories\GradeRepository;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class GradeService
{
    public function repo()
    {
        return app(GradeRepository::class);
    }

    public function create($opts) {
        $student_takes_course_id = $opts['student_takes_course_id'];
        $score = (float)$opts['score'];

        $totalScore = $this->repo()->total($student_takes_course_id) + $score;
        if ($totalScore > 100) {
            throw ValidationException::withMessages([
                'score' => "total score should not exceed 100"
            ]);
        }
        return $this->repo()->create($opts);
    }
}