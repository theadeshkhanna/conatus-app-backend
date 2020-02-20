<?php

namespace App;

use App\Team;
use Illuminate\Support\Facades\DB;

class Helpers {
    public static function generateTeamId() {
        $recent_team = DB::table('teams')->latest('created_at')->first();

        if ($recent_team) {
            $lastId = $recent_team->generated_id;
            $num = explode('-', $lastId)[1];
            $val = 'COD' . '-' . ++$num;
        } else {
            $val = 'COD-100';
        }

        return $val;
    }

    public static function generateStoneValue($participants) {
        $team_id = $participants[0]['participant_1']->team_id;
        $team = Team::find($team_id);
        $stone = $team->stone;

        switch ($stone) {
            case 1 : return 'Igni';
                     break;
            case 2 : return 'Quen';
                     break;
            case 3 : return 'Axii';
                     break;
            case 4 : return 'Aard';
                     break;
        }
    }

    public static function generateStone() {
        $recent_stone = Db::table('teams')->latest('created_at')->first();

        if ($recent_stone) {
            $stone = $recent_stone->stone;
            if($stone < 4) {
                $val = ++$stone;
            } else {
                $val = 1;
            }
        } else {
            $val = 1;
        }

        return $val;
    }
}
