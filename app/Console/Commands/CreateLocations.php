<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Service\AddToModel;
use App\Models\Location;

class CreateLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:locations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add locations to database';

    /**
     * Execute the console command.
     */
    public function handle(AddToModel $add): void
    {
		$add->upsert(Location::class, config('locations'));
    }
}
