<?php

use App\Team;
use Illuminate\Support\Facades\DB;

class Helpers {
    public static function generateTeamId() {
        $recent_team_id = DB::table('teams')->latest('created_at')->first()->id;

        if (is_null($recent_team_id)) {
            return 'COD-001';
        }
        else {
            return 'COD-' . ++$recent_team_id;
        }

    }
}
