<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Npc;

class NpcService {
	public function generate(Collection $map, Collection $quests, int $number): Collection {

		$output = collect([]);
		$npcs = Npc::inRandomOrder()->limit($number)->get();
		foreach($npcs as $npc) {
			$location = $map->random();
			$quest = $quests->random();
			$output->push(array_merge($npc->toArray(), [
				'location' => $location['id'],
				'quest' => $quest['id']
			]));
		}
		return $output;
	}
}
