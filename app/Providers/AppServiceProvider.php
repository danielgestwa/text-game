<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Generator\GameInterface;
use App\Services\Generator\TextGame;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GameInterface::class, function() {
			return new TextGame();
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
