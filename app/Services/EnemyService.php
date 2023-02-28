<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Enemy;

class EnemyService {

	public function generate(int $number, Collection $map, Collection $items): Collection {
		$enemies = Enemy::inRandomOrder()->limit($number)->get();
		foreach($enemies as $enemy) {
			$enemy['location'] = $map->random()['id'];
			$enemy['count'] = random_int(1, 5);
			$enemy['item'] = $enemy['has_weapon'] ? $items['weapons']->random()['id'] : null;
		}
		return $enemies;
	}
}
