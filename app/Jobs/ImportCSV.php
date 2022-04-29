<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportCSV implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $line;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($line)
    {
        $this->line = $line;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->line != '') {
            $parameters = str_getcsv($this->line);

            $input = [
                'customer_email' => $parameters[0],
                'amount' => intval($parameters[1]),
                'date' => $parameters[2]
            ];

            $payment = Payment::create($input);
        }
    }
}
