<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Service\AddToModel;
use App\Models\Npc;

class CreateNPCs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:npcs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add NPCs to database';

    /**
     * Execute the console command.
     */
    public function handle(AddToModel $add): void
    {
		$add->upsert(Npc::class, config('npcs'));
    }
}
