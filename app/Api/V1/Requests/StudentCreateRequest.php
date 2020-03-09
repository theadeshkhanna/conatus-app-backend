<?php

namespace App\Api\V1\Requests;

use StudentCreateContract;

class StudentCreateRequest extends BaseRequest implements StudentCreateContract {
    const NAME           = 'name';
    const STUDENT_NUMBER = 'student_number';
    const ROLL_NUMBER    = 'roll_number';
    const YEAR           = 'year';
    const BRANCH         = 'branch';
    const LANGUAGE       = 'language';
    const EMAIL          = 'email';
    const PHONE_NUMBER   = 'phone_number';

    public function rules() {
        return [
            self::NAME           => 'required|string',
            self::STUDENT_NUMBER => 'required|string',
            self::ROLL_NUMBER    => 'required|string',
            self::YEAR           => 'required|in:1,2,3,4',
            self::BRANCH         =>  'required|in:CSE,IT,CE,EN,ECE,ME,CS/IT,CS,EI',
            self::LANGUAGE       => 'required|in:java,python',
            self::EMAIL          => 'required|email',
            self::PHONE_NUMBER   => 'required|string'
        ];
    }

    public function getName() {
        return $this->get(self::NAME);
    }

    public function getEmail() {
        return $this->get(self::EMAIL);
    }

    public function getYear() {
        return $this->get(self::YEAR);
    }

    public function getPhoneNumber() {
        return $this->get(self::PHONE_NUMBER);
    }

    public function getBranch() {
        return $this->get(self::BRANCH);
    }

    public function getStudentNumber() {
        return $this->get(self::STUDENT_NUMBER);
    }

    public function getRollNumber() {
        return $this->get(self::ROLL_NUMBER);
    }

    public function getLanguage() {
        return $this->get(self::LANGUAGE);
    }
}
