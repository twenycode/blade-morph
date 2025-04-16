<?php

namespace TwenyCode\BladeMorph;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class BladeMorphServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blademorph.php', 'blademorph');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishResources();
        $this->bootResourcesViews();
        $this->bootBladeComponents();
    }

    /**
     * Publish package resources.
     */
    private function publishResources(): void
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../config/blademorph.php' => config_path('blademorph.php'),
        ], 'blademorph-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/blademorph'),
        ], 'blademorph-views');
    }

    /**
     * Load views from the package.
     */
    private function bootResourcesViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blademorph');
    }

    /**
     * Compile Blade Components.
     */
    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('blademorph.components', []) as $alias => $component) {
                $blade->component($component, $alias);
            }
        });
    }
}