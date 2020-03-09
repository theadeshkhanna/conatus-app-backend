<?php

use App\Student;

class StudentService {
    public function create(StudentCreateContract $contract) {
        $student = new Student();
        $student->name = $contract->getName();
        $student->year = $contract->getYear();
        $student->branch = $contract->getBranch();
        $student->email = $contract->getEmail();
        $student->phone_number = $contract->getPhoneNumber();
        $student->student_number = $contract->getStudentNumber();
        $student->language = $contract->getLanguage();
        $student->roll_number = $contract->getRollNumber();

        $student->save();
        return $student;
    }
}
