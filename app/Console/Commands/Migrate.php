<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Migrate extends Command
{
    protected $signature = 'Migrate';

    protected $description = 'Refresh the database and seed it with default data';

    public function handle()
    {
        $this->call('migrate:fresh');

        $this->info('Database successfully refreshed');
    }
}
