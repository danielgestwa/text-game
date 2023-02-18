<?php

namespace App\Console\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AddToModel {

	public function upsert(string $model, array $items, string $key = 'name'): void {
	foreach($items as $item) {
			$model::updateOrCreate(
				[ $key => $item[$key] ],
				[
					'id' => (string) Str::uuid(),
					...$item
				]			
			);
		}
	}
}
