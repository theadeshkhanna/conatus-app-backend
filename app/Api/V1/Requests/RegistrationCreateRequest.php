<?php

use App\Api\V1\Requests\BaseRequest;
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
           self::BRANCH_1 => 'required|valid_branch_types', //TODO : need to write about validation
           self::BRANCH_2 => 'required|valid_branch_types',
           self::STUDENT_NUMBER_1 => 'required',
           self::STUDENT_NUMBER_2 => 'required',
        ];
    }
}
