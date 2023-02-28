<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Service\AddToModel;
use App\Models\Enemy;

class CreateEnemies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:enemies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add enemies to database';

	protected $enemies = [
		[
			'name' => 'Goblin',
			'description' => 'Small, ugly and smelly creature with big sharp teeth and green crazy eyes',
			'hp' => 30,
			'damage' => 10,
			'lvl' => 1,
			'handle_weapon' => false,
			'skills' => '{}'
		]
	];

    /**
     * Execute the console command.
     */
    public function handle(AddToModel $add): void
    {
		$add->upsert(Enemy::class, $this->enemies);
    }
}
