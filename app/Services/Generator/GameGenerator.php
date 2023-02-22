<?php

namespace App\Services\Generator;

class GameGenerator {

	private $map;
	private $enemies;
	private $npcs;
	private $quests;

	public function generateEasyGame(GameInterface $game): void {
		$this->map = $game->generateMap(20);
		$this->enemies = $game->generateEnemies($this->map, 10);
		$this->quests = $game->generateQuests($this->map, $this->enemies, 10);
		$this->npcs = $game->generateNpcs($this->map, $this->quests, 10);
	}

	public function getResult(): array {
		return [
			'map' => $this->map,
			'enemies' => $this->enemies,
			'quests' => $this->quests,
			'npcs' => $this->npcs
		];
	}
}
