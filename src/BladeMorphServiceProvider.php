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
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-morph.php', 'blade-morph');
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
            __DIR__ . '/../config/blade-morph.php' => config_path('blade-morph.php'),
        ], 'blade-morph-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/blade-morph'),
        ], 'blade-morph-views');
    }

    /**
     * Load views from the package.
     */
    private function bootResourcesViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-morph');
    }

    /**
     * Compile Blade Components.
     */
    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('blade-morph.components', []) as $alias => $component) {
                $blade->component($component, $alias);
            }
        });
    }
}