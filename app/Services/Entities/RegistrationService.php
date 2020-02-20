<?php

namespace App\Services\Entities;

use App\Participant;
use App\Services\Contracts\RegistrationCreateContract;
use App\Helpers;
use App\Team;

class RegistrationService {

    public function createRegistration(RegistrationCreateContract $contract) {
        $team = new Team();
        $team->team_name = $contract->getTeamName();
        $team->generated_id = Helpers::generateTeamId();
        $team->stone = Helpers::generateStone();
        $team->save();

        $participant = new Participant();
        $participant->name_1 = $contract->getName1();
        $participant->name_2 = $contract->getName2();
        $participant->branch_1 = $contract->getBranch1();
        $participant->branch_2 = $contract->getBranch2();
        $participant->student_number_1 = $contract->getStudentNumber1();
        $participant->student_number_2 = $contract->getStudentNumber2();
        $participant->year_1 = $contract->getYear1();
        $participant->year_2 = $contract->getYear2();
        $participant->email_1 = $contract->getEmail1();
        $participant->email_2 = $contract->getEmail2();
        $participant->team_id = $team->id;

        $participant->save();

        return $participant;
    }
}
