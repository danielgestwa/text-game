<?php

namespace App\Services\Generator;

use Illuminate\Support\Collection;

interface GameInterface {

	public function generateMap(int $locationNumber);
	public function generateEnemies(Collection $map, int $enemyNumber);

}
