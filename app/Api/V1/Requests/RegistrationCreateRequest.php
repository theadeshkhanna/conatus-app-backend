<?php

namespace App\Api\V1\Requests;

use App\Services\Contracts\RegistrationCreateContract;

class RegistrationCreateRequest extends BaseRequest implements RegistrationCreateContract {
    const NAME_1 = 'name_1';
    const NAME_2 = 'name_2';
    const BRANCH_1 = 'branch_1';
    const BRANCH_2 = 'branch_2';
    const STUDENT_NUMBER_1 = 'student_number_1';
    const STUDENT_NUMBER_2 = 'student_number_2';
    const YEAR_1 = 'year_1';
    const YEAR_2 = 'year_2';
    const EMAIL_1 = 'email_1';
    const EMAIL_2 = 'email_2';
    const TEAM_NAME = 'team_name';

    public function rules() {
        return [
           self::NAME_1 => 'required|string',
           self::NAME_2 => 'required|string',
           self::BRANCH_1 => 'required', //TODO : need to write about validation
           self::BRANCH_2 => 'required',
           self::STUDENT_NUMBER_1 => 'required',
           self::STUDENT_NUMBER_2 => 'required',
           self::YEAR_1 => 'required',
           self::YEAR_2 => 'required',
           self::EMAIL_1 => 'required|email',
           self::EMAIL_2 => 'required|email',
           self::TEAM_NAME => 'required'
        ];
    }

    public function getName1() {
        return $this->get(self::NAME_1);
    }

    public function getName2() {
        return $this->get(self::NAME_2);
    }

    public function getBranch1() {
        return $this->get(self::BRANCH_1);
    }

    public function getBranch2() {
        return $this->get(self::BRANCH_2);
    }

    public function getStudentNumber1() {
        return $this->get(self::STUDENT_NUMBER_1);
    }

    public function getStudentNumber2() {
        return $this->get(self::STUDENT_NUMBER_2);
    }

    public function getYear1() {
        return $this->get(self::YEAR_1);
    }

    public function getYear2() {
        return $this->get(self::YEAR_2);
    }

    public function getEmail1() {
        return $this->get(self::EMAIL_1);
    }

    public function getEmail2() {
        return $this->get(self::EMAIL_2);
    }

    public function getTeamName() {
        return $this->get(self::TEAM_NAME);
    }
}
