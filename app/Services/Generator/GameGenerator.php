<?php

namespace App\Services\Generator;

class GameGenerator {

	private $map;
	private $items;
	private $enemies;
	private $npcs;
	private $quests;

	public function generateEasyGame(GameInterface $game): void {
		$this->map = $game->map(8);
		$this->items = $game->items(3, $this->map);
		$this->enemies = $game->enemies(4, $this->map, $this->items);
		$this->quests = $game->quests(3, $this->map, $this->enemies, $this->items);
		$this->npcs = $game->npcs(3, $this->map, $this->quests);
	}

	public function getResult(): array {
		return [
			'map' => $this->map,
			'items' => $this->items,
			'enemies' => $this->enemies,
			'quests' => $this->quests,
			'npcs' => $this->npcs
		];
	}
}
