<?php

namespace App\Console\Commands;

use App\Http\Services\ExportCustomers;
use Illuminate\Console\Command;

class Export extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:customers {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export customers in csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $export = new ExportCustomers($this->argument('file') . '.csv');
        $export->export();

        return 0;
    }
}
