<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\Npc;

class NpcService {
	public function generate(int $number, Collection $map, Collection $quests): Collection {
		$npcs = Npc::inRandomOrder()->limit($number)->get();
		foreach($npcs as $npc) {
			$npc['location'] = $map->random()['id'];
			$npc['quest'] = $quests->random()['id'];
		}
		return $npcs;
	}
}
