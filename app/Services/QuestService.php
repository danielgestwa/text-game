<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Enums\ItemTypes;

class QuestService {

	private $names = [
		'slayer',
		'issue',
		'hunt',
		'job',
		'bounty',
		'case'
	];

	public function __construct() {
		$this->names = collect($this->names);
	}

	public function generate(int $number, Collection $map, Collection $enemies, Collection $items): Collection {
		$quests = collect([]);
		foreach($enemies as $enemy) {

			$name = $enemy['name'] . ' ' . $this->names->random();
			$description = 'Kill ' .
				$enemy['count'] . ' ' .
				$enemy['name'] . '/s in ' .
				$map->where('id', $enemy['location'])->first()['name'];
			$revards = $items
					->where('type', ItemTypes::Weapon)
					->where('level', $enemy['level'] + 1);
			$revard = $revards->isEmpty() ? null : $revards?->random()['id'];

			$quests->push([
				'id' => (string) Str::uuid(),
				'name' => $name,
				'description' => $description,
				'object_id' => $enemy['id'],
				'object_type' => 'Enemy',
				'revard_id' => $revard,
				'revard_type' => 'Item',
				'done' => false,
				'received' => false
			]);
		}
		return $quests;
	}
}
