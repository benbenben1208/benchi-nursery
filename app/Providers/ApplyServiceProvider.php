<?php

namespace App\Providers;

use App\Services\applyService;
use Illuminate\Support\ServiceProvider;

class ApplyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ApplyService',
            applyService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
