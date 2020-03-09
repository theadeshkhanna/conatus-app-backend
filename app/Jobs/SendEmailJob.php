<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $student;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = [
           'name' => $this->student->name,
           'language' => $this->student->language
        ];

        $emailHeaders = [
           'email' => $this->student->email,
           'name'  => $this->student->name
        ];

        Mail::send('email.confirmation', $data, function ($message) use ($emailHeaders){
            $message->to($emailHeaders['email'], $emailHeaders['name'])->subject('Workshop Registration Confirmation');
        });
    }
}
