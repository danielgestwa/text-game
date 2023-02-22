<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Enemy;

class EnemyService {

	public function generate(Collection $map, int $number = 5) {

		$output = collect([]);
		$enemies = Enemy::inRandomOrder()->limit($number)->get();
		foreach($enemies as $enemy) {
			$location = $map->random();
			$output->push(array_merge($enemy->toArray(), [
				'location' => $location['id'],
				'count' => random_int(1, 5),
				'item' => null
			]));
		}

		return $output;
	}
}
