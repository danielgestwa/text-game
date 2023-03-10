<?php

use App\Enums\ItemTypes;

return [
	[
		'name' => 'Stara skrzynia',
		'description' => "Drewniana stara skrzynia z metalowymi okuciami i mnóstwem dziur",
		'type' => ItemTypes::Chest,
		'level' => null,
		'effects' => '{}'
	],
	[
		'name' => 'Drewniana skrzynia',
		'description' => "Prosta skrzynia wykonana z drewna",
		'type' => ItemTypes::Chest,
		'level' => null,
		'effects' => '{}'
	],
	[
		'name' => 'Drewniana beczka',
		'description' => 'Duża beczka wykorzystywana do przechowywania alkoholu',
		'type' => ItemTypes::Chest,
		'level' => null,
		'effects' => '{}'
	],
	[
		'name' => 'Szuflada',
		'description' => 'Zwykła szuflada',
		'type' => ItemTypes::Chest,
		'level' => null,
		'effects' => '{}'
	],
	[
		'name' => 'Kartonowe pudełko',
		'description' => '',
		'type' => ItemTypes::Chest,
		'level' => null,
		'effects' => '{}'
	],
	[
		'name' => 'Ser',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": 5 }'
	],
	[
		'name' => 'Chleb',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": 5 }'
	],
	[
		'name' => 'Udziec',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": 8 }'
	],
	[
		'name' => 'Szynka',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": 5 }'
	],
	[
		'name' => 'Mięso',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": 10 }'
	],
	[
		'name' => 'Zepsute mięso',
		'description' => '',
		'type' => ItemTypes::Eatable,
		'level' => null,
		'effects' => '{ "hp": -10 }'
	],
];
