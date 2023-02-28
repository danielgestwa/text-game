<?php

namespace App\Services\Generator;

use Illuminate\Support\Collection;

interface GameInterface {

	public function map(int $locationNumber);
	public function enemies(int $number, ...$other);

}
