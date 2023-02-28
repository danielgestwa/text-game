<?php

namespace App\Services\Generator;

class GameGenerator {

	private $map;
	private $items;
	private $enemies;
	private $npcs;
	private $quests;

	public function generateEasyGame(GameInterface $game): void {
		$this->map = $game->map(20);
		$this->items = $game->items(20, $this->map);
		$this->enemies = $game->enemies(10, $this->map, $this->items);
		$this->quests = $game->quests(5, $this->map, $this->enemies, $this->items);
		$this->npcs = $game->npcs(10, $this->map, $this->quests);
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
