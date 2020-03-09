<?php

namespace App\Api\V1\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException as SymphonyHttpException;

class HttpException extends SymphonyHttpException {
    const PARTICIPANT_ALREADY_EXISTS_EXCEPTION = 1;
    const STUDENT_ALREADY_EXISTS_EXCEPTION = 2;

    public function __construct($message, $errorCode, $statusCode = 300) {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}



