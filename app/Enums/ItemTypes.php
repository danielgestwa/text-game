<?php

namespace App\Enums;

enum ItemTypes: int {
	case Weapon = 0;
	case Eatable = 1;
	case Chest = 2;
	case Potion = 3;
}
