<?php

namespace App\Api\V1\Controllers;

use App\Services\Entities\RegistrationService;

class RegistrationController extends BaseController {
    protected $registrationService;

    public function __construct() {
        $this->registrationService = new RegistrationService();
    }

    public function create() {
        return $this->registrationService->createRegistration();
    }
}
