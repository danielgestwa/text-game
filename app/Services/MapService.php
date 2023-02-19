<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use App\Models\Location;

class MapService {

	private $directions = [
		'N' => null,
		'S' => null,
		'W' => null,
		'E' => null
	];

	private $directionsInvert = [
		'N' => 'S',
		'S' => 'N',
		'W' => 'E',
		'E' => 'W'
	];

	public function generate(): Collection {

		$locations = Location::inRandomOrder()->limit(50)->get();
	
		$output = collect([]);
		foreach($locations as $newLocation) {
			$newLocationWithDir = collect(
				array_merge($newLocation->toArray(), $this->directions)
			);
			if($output->isEmpty()) {
				$output->push($newLocationWithDir);
				continue;
			}

			//foreach(['N', 'S', 'W', 'E'] as $direction)
			$shuffledDirections = Arr::shuffle(array_keys($this->directions));
			foreach($shuffledDirections as $direction) {			
				$currentLocationWithDir = $output
					->whereNull($direction)
					->random();

				if($currentLocationWithDir) {
					$currentLocationWithDir[$direction] = $newLocationWithDir['id'];
					$newLocationWithDir[$this->directionsInvert[$direction]] = $currentLocationWithDir['id'];
					$output->push($newLocationWithDir);
					break;
				}
			}
		}

		return $output;
	}
}
