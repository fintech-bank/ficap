<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetLoanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        match ($this->argument('action')) {
            'updateUser' => ""
        };
        return Command::SUCCESS;
    }
}
