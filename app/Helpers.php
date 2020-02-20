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
}
