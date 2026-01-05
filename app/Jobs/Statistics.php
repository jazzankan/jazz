<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class Statistics implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //public $statistics;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $date = \Carbon\Carbon::now()->timezone('Europe/Stockholm')->format('Y-m-d');
        $day = \Carbon\Carbon::now()->timezone('Europe/Stockholm')->minDayName;
        $number = file_get_contents("daycounter.txt");

        DB::table('statistics')->insert(['date'=>$date,'day'=>$day,'number'=>$number]);
        file_put_contents("daycounter.txt", 0);
    }
}
