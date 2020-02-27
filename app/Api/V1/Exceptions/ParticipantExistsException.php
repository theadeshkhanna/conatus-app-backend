<?php

namespace App\Api\V1\Exceptions;

class ParticipantExistsException extends HttpException {
    const ERROR_MESSAGE = 'Participant Already Exists';

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::PARTICIPANT_ALREADY_EXISTS_EXCEPTION, );
    }
}
