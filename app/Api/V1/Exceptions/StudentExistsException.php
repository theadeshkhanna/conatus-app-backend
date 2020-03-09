<?php

namespace App\Api\V1\Exceptions;

class StudentExistsException extends HttpException {
    const ERROR_MESSAGE = 'Student Already Exists';

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::STUDENT_ALREADY_EXISTS_EXCEPTION);
    }
}
