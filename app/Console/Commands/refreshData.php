<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Cache;

class refreshData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Force a refresh of data the next time the endpoint is called.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Cache::forget('my_data');
        Cache::flush();
        Cache::clear();
        $this->info('Data refresh has been scheduled.');
    }
}
