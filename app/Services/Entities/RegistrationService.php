<?php

namespace App\Services\Entities;

use App\Api\V1\Exceptions\ParticipantExistsException;
use App\Participant;
use App\Services\Contracts\RegistrationCreateContract;
use App\Helpers;
use App\Team;

class RegistrationService {

    public function createRegistration(RegistrationCreateContract $contract) {

        $participant = Participant::query()
            ->where('email', '=',$contract->getEmail1())
            ->orwhere('student_number', '=', $contract->getStudentNumber1())
            ->orWhere('email', '=', $contract->getEmail2())
            ->orWhere('student_number', '=',  $contract->getStudentNumber2())
            ->first();

        if($participant) {
            throw new ParticipantExistsException();
        }

        $participants = array();

        $team = new Team();
        $team->team_name = $contract->getTeamName();
        $team->generated_id = Helpers::generateTeamId();
        $team->stone = Helpers::generateStone();
        $team->save();

        $participant_1 = new Participant();
        $participant_1->name = $contract->getName1();
        $participant_1->branch = $contract->getBranch1();
        $participant_1->student_number = $contract->getStudentNumber1();
        $participant_1->year = $contract->getYear1();
        $participant_1->email = $contract->getEmail1();
        $participant_1->team_id = $team->id;
        $participant_1->save();

        $participant_2 = new Participant();
        $participant_2->name = $contract->getName2();
        $participant_2->branch = $contract->getBranch2();
        $participant_2->student_number = $contract->getStudentNumber2();
        $participant_2->year = $contract->getYear2();
        $participant_2->email = $contract->getEmail2();
        $participant_2->team_id = $team->id;
        $participant_2->save();

        array_push($participants, [
            'participant_1' => $participant_1,
            'participant_2' => $participant_2
        ]);

        return $participants;
    }
}
