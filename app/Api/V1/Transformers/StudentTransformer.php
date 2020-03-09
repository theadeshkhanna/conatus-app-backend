<?php

namespace App\Api\V1\Transformers;

use App\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract {
    public function transform(Student $student) {
        return [
            'name'           => $student->name,
            'email'          => $student->email,
            'phone_number'   => $student->phone_number,
            'language'       => $student->language,
            'roll_number'    => $student->roll_number,
            'student_number' => $student->student_number,
            'year'           => $student->year,
            'branch'         => $student->branch
        ];
    }
}
