<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Generator\GameGenerator;
use App\Services\Generator\GameInterface;;

class GameController extends Controller
{
	public function index(GameInterface $game, GameGenerator $gg) {
	
		$gg->generateEasyGame($game);
		dd($gg->getResult());

		return response()->json();

	}
}
