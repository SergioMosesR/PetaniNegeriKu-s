<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Migrate extends Command
{
    protected $signature = 'Migrate';

    protected $description = 'Refresh the database and seed it with default data';

    public function handle()
    {
        $this->call('migrate:fresh');

        Artisan::call('db:seed', ['--class' => 'User']);

        $this->info('Database successfully refreshed');
    }
}
