<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

	public function generate(Collection $map, Collection $enemies, int $number): Collection {
		$output = collect([]);
		foreach($enemies as $enemy) {
			$output->push([
				'id' => (string) Str::uuid(),
				'name' => $enemy['name'] . ' ' . $this->names->random(),
				'description' => 'Kill ' . $enemy['count'] . ' ' . $enemy['name'] . '/s in ' . $map->where('id', $enemy['location'])->first()['name'],
				'object_id' => $enemy['id'],
				'object_type' => 'Enemy',
				'revard_id' => null,
				'revard_type' => 'Item',
				'done' => false,
				'received' => false
			]);
		}
		return $output;
	}
}
