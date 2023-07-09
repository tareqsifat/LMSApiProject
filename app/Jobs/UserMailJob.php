<?php

namespace App\Jobs;

use App\Mail\UserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UserMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->user = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail::to($sendto)->send(new SendSBTorecipient($sb));
        Mail::to($this->user['email'])->send(new UserMail($this->user));
    }
}
