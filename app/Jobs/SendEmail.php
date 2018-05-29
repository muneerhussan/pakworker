<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Log;
use \Exception;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

protected  $data;
protected  $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type,$data=[])
    {
        $this->type=$type;
        $this->data=$data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
       try{
            $params = (object)['subject'=>'','data'=> $this->data];
            $mail= InstanceFactory::getMail($this->type,$params);
            Mail::to($this->data['mail'])->send($mail);
        }
       catch(Exception $e)
       {
         Log::info($e->getMessage().' File:'.$e->getFile().' Line:'.$e->getLine());   
       }
}
}
