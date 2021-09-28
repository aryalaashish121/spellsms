<?php

namespace App\Jobs;

use App\services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScheduleSmsLaterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //here allList is in form of array
        $smsService = new SmsService();
        $response = $smsService->textSMS($this->data['allList'],$this->data['message']);
        return $response;
    }
}
