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

	protected $npcs = [
		[
			'name' => 'Johnny Joestar',
			'description' => 'Blonde hair boy with blue eyes. His legs are pralysed and he have a Steel Ball Run sticker on his t-shirt'
		],
		[
			'name' => 'Rachel',
			'description' => 'Holly molly... That ass is smokin hot! Latte skin with curly short hair and the most beauityfull smile in the world.'
		]
	];

    /**
     * Execute the console command.
     */
    public function handle(AddToModel $add): void
    {
		$add->upsert(Npc::class, $this->npcs);
    }
}
