<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MapService;

class GameController extends Controller
{
	public function index(MapService $map) {
		dd($map->generate());
	}
}
