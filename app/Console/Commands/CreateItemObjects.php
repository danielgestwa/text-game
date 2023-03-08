<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use App\Console\Service\AddToModel;

class CreateItemObjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:itemObjects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add items (chests, keys, objects) to db';

    /**
     * Execute the console command.
     */
	public function handle(AddToModel $add): void
    {
		$add->upsert(Item::class, config('objects'));
    }
}
