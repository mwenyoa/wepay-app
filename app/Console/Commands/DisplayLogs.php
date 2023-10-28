<?php
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DisplayLogs extends Command
{
    protected $signature = 'logs:display';
    protected $description = 'Display application logs in the terminal';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $logFile = storage_path('logs/laravel.log');
        $logs = file_get_contents($logFile);

        $this->info($logs);
    }
}
