<?php

namespace Manajet\ExtraResource\Providers;

use Illuminate\Support\ServiceProvider;
use Manajet\ExtraResource\Commands\MakeExtraResource;

class LaravelServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            MakeExtraResource::class,
        ]);
    }
}
