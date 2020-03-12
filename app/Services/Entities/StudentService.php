<?php

namespace App\Services\Entities;

use App\Api\V1\Exceptions\StudentExistsException;
use App\Services\Contracts\StudentCreateContract;
use App\Student;

class StudentService {
    public function create(StudentCreateContract $contract) {

        $student = Student::query()
            ->where('email', '=',$contract->getEmail())
            ->orwhere('student_number', '=', $contract->getStudentNumber())
            ->orwhere('roll_number', '=', $contract->getRollNumber())
            ->first();

        if($student) {
            throw new StudentExistsException();
        }

        $student = new Student();

        $student->name = $contract->getName();
        $student->year = $contract->getYear();
        $student->branch = $contract->getBranch();
        $student->email = $contract->getEmail();
        $student->phone_number = $contract->getPhoneNumber();
        $student->student_number = $contract->getStudentNumber();
        $student->language = $contract->getLanguage();
        $student->roll_number = $contract->getRollNumber();
        $student->gender = $contract->getGender();
        $student->hosteler = $contract->getHosteler();

        $student->save();
        return $student;
    }
}
