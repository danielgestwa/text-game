<?php

namespace App\Services\Generator;

use Illuminate\Support\Collection;
use App\Services\MapService;
use App\Services\EnemyService;
use App\Services\NpcService;
use App\Services\QuestService;
use App\Services\ItemService;

class TextGame implements GameInterface {

	public function map(int $number) {
		return (new MapService)->generate($number);
	}

	public function items(int $number, ...$other) {
		return (new ItemService())->generate($number, ...$other);
	}

	public function enemies(int $number, ...$other) {
		return (new EnemyService)->generate($number, ...$other);
	}

	public function quests(int $number, ...$other) {
		return (new QuestService)->generate($number, ...$other);
	}

	public function npcs(int $number, ...$other) {
		return (new NpcService)->generate($number, ...$other);
	}
}
