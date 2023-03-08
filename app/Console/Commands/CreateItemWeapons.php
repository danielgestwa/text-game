<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Item;
use app\console\service\addtomodel;

class CreateItemWeapons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:itemWeapons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add weapons to database';

	protected $items;

    /**
     * Execute the console command.
     */
    public function handle(AddToModel $add): void
    {
		$add->upsert(Item::class, config('weapons'));
    }
}
