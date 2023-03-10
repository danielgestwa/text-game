<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Enums\ItemTypes;
use App\Models\Item;

class QuestService {

	private $names = [
		'Ubicie potwora',
		'Problem z dziką kreaturą',
		'Polowanie na zwierza',
		'Brudna robota',
		'Nagroda za schwytanie',
		'Trudna sprawa z bestią'
	];

	public function __construct() {
		$this->names = collect($this->names);
	}

	public function generate(int $number, Collection $map, Collection $enemies): Collection {
		$quests = collect([]);
		foreach($enemies as $enemy) {

			$name = $this->names->random();
			$description = 'Zabij ' .
				$enemy['count'] . 'x ' .
				$enemy['name'] . ' w ' .
				$map->where('id', $enemy['location'])->first()['name'];
			$revard = Item::where('type', ItemTypes::Weapon)
				->where('level', $enemy['level'] + 1)
				->inRandomOrder()
				->first() ?? null;

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
