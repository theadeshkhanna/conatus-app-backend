<?php

namespace App\Api\V1\Controllers;

use App\Jobs\SendConfirmationEmailJob;
use App\Services\Entities\RegistrationService;
use RegistrationCreateRequest;

class RegistrationController extends BaseController {
    protected $registrationService;

    public function __construct() {
        $this->registrationService = new RegistrationService();
    }

    public function create(RegistrationCreateRequest $request) {
        $participant = $this->registrationService->createRegistration($request);
        $this->dispatch(new SendConfirmationEmailJob($participant));
    }
}
