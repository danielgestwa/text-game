<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Models\Item;
use App\Enums\ItemTypes;

class ItemService {

	public function generate(int $number, Collection $map): Collection {		
		return collect([
			'chests' => $this->generateChests($number, $map),
			'weapons' => $this->generateWeapons($number)
		]);
	}

	private function generateChests(int $number, Collection $map): Collection {
		$chests = Item::where('type', ItemTypes::Chest)
			->inRandomOrder()
			->limit($number)
			->get();
		foreach($chests as $chest) {
			$chest['items'] = Item::whereNot('type', ItemTypes::Chest)
				->inRandomOrder()
				->limit(rand(0, 3))
				->get()
				->toArray();
			$chest['location'] = $map->random()['id'];
		}

		return $chests;
	}

	private function generateWeapons(int $number) {
		return Item::where('type', ItemTypes::Weapon)
			->inRandomOrder()
			->limit($number)
			->get();
	}
}
