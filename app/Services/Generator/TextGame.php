<?php

namespace App\Services\Generator;

use Illuminate\Support\Collection;
use App\Services\MapService;
use App\Services\EnemyService;
use App\Services\NpcService;
use App\Services\QuestService;

class TextGame implements GameInterface {

	public function generateMap(int $locationNumber) {
		$mapService = new MapService();
		return $mapService->generate($locationNumber);
	}

	public function generateEnemies(Collection $map, int $enemyNumber) {
		$enemyService = new EnemyService();
		return $enemyService->generate($map, $enemyNumber);
	}

	public function generateQuests(Collection $map, Collection $enemies, int $questNumber) {
		$questService = new QuestService();
		return $questService->generate($map, $enemies, $questNumber);
	}

	public function generateNpcs(Collection $map, Collection $quests, int $npcNumber) {
		$npcService = new NpcService();
		return $npcService->generate($map, $quests, $npcNumber);
	}
}
