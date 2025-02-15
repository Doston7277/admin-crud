<?php

namespace Vendor\Package;

use Illuminate\Support\ServiceProvider;
use Vendor\Package\Commands\MakeAdvancedController;

class AdvancedControllerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            MakeAdvancedController::class,
        ]);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/stubs/controller.stub' => base_path('stubs/controller.stub'),
        ], 'stubs');
    }
}
