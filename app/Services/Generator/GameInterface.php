<?php

namespace App\Services\Generator;

use Illuminate\Support\Collection;

interface GameInterface {

	public function map(int $locationNumber);
	public function items(int $number, ...$other);
	public function enemies(int $number, ...$other);
	public function quests(int $number, ...$other);
	public function npcs(int $number, ...$other);

}
