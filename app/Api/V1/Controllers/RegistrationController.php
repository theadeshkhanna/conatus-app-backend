<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\RegistrationCreateRequest;
use App\Helpers;
use App\Jobs\SendConfirmationEmailJob;
use App\Services\Entities\RegistrationService;
use App\Team;

class RegistrationController extends BaseController {
    protected $registrationService;

    public function __construct() {
        $this->registrationService = new RegistrationService();
    }

    public function create(RegistrationCreateRequest $request) {
        $participants = $this->registrationService->createRegistration($request);
        $this->dispatch(new SendConfirmationEmailJob($participants));
        return [
            'stone'       => Helpers::generateStoneValue($participants)
        ];
    }
}
