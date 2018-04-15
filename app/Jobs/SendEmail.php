<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

protected  $use;
protected $token;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($use,$token)
    {
        
        $this->use=$use;
        $this->token=$token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($use,$token)
    {
        Mail::raw($this->token,function($message) {
                $message->to($use->email);
                $message->subject(" hello $use->name,Get your token below");
                });
    }
    
}
