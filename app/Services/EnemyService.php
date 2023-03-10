<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Enemy;
use App\Models\Item;

class EnemyService {

	public function generate(int $number, Collection $map): Collection {
		$enemies = Enemy::inRandomOrder()->limit($number)->get();
		foreach($enemies as $enemy) {
			$enemy['location'] = $map->random()['id'];
			$enemy['count'] = random_int(1, 5);
			$enemy['item'] = null;
			
			if($enemy['has_weapon']) {
				$enemy['item'] = Item::where('type', ItemTypes::Weapon)
					->where('level', $enemy['level'])
					->inRandomOrder()
					->first();
			}
		}
		return $enemies;
	}
}
