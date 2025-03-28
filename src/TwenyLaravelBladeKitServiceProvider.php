<?php

namespace TwenyCode\TwenyUiKit;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

final class TwenyLaravelBladeKitServiceProvider extends ServiceProvider
{
    //  Register services.
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tweny-ui-kit.php', 'tweny-ui-kit-config');
    }

    //  Bootstrap services.
    public function boot()
    {
       $this->bootResourcesViews();
       $this->bootBladeComponents();
    }

    //  Load views from the package
    private function bootResourcesViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views','tweny-ui-kit-views');
    }

    //  Compile Blade Components
    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {

            foreach (config('tweny-ui-kit-config.components', []) as $alias => $component) {
                $blade->component($component, $alias);
            }
        });
    }
}
