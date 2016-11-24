<?php

namespace TeachMe\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        view()->composer(
            'tickets/list',
            'TeachMe\Http\ViewComposers\TicketsListComposer'
        );
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
