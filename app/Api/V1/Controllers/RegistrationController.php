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
//        return $this->test($participants);
        return [
            'participants' => $participants,
            'stone'       => Helpers::generateStoneValue($participants)
        ];
    }

    public function test($participants) {
        for ($i = 0; $i < 2; $i++) {
            $data = [
                'name' => $participants[$i]['participant_' . ($i+1)]->name,
                'stone' => Helpers::generateStoneValue($participants),
                'team_id' => Team::find($participants[$i]['participant_' . ($i+1)]->team_id)->generated_id
            ];

           array_push($val, $data) ;
        }
    }
}
