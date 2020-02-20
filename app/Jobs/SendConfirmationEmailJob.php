<?php

namespace App\Jobs;


use App\Helpers;
use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendConfirmationEmailJob implements ShouldQueue {
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $participants;

    /**
     * Create a new job instance.
     *
     *
     * @param $participants
     */
    public function __construct($participants) {
        $this->participants = $participants;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i = 0; $i < 2; $i++) {

            $data = [
                'name' => $this->participants[$i]['participant_' . ($i+1)]->name,
                'stone' => Helpers::generateStoneValue($this->participants),
                'team_id' => Team::find($this->participants[$i]['participant_' . ($i+1)]->team_id)->generated_id
            ];

            $emailHeaders = [
                'email' => $this->participants[$i]['participant_' . ($i+1)]->email,
                'name' => $this->participants[$i]['participant_' . ($i+1)]->name
            ];

            Mail::send('email.register', $data, function ($message) use ($emailHeaders){
                $message->to($emailHeaders['email'], $emailHeaders['name'])->subject('COD Registration Confirmation');
            });
        }
    }
}
