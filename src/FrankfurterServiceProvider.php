<?php

declare(strict_types=1);

namespace Investbrain\Frankfurter;

use Illuminate\Support\ServiceProvider;

class FrankfurterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/frankfurter.php',
            'frankfurter'
        );

        $this->app->singleton(\Investbrain\Frankfurter\FrankfurterClient::class, function () {
            return new \Investbrain\Frankfurter\FrankfurterClient;
        });
    }

    public function boot()
    {
        /**
         * Publish settings config file
         */
        $this->publishes([
            __DIR__.'/../config/frankfurter.php' => config_path('frankfurter.php'),
        ], 'config');
    }
}
