<?php

namespace App\Jobs;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendConfirmationEmailJob implements ShouldQueue {
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $participant;

    /**
     * Create a new job instance.
     *
     *
     *
     */
    public function __construct($participant) {
        $this->participant = $participant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

    }
}
