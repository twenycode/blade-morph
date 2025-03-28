<?php

namespace TwenyCode\LaravelBladeKit;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

final class TwenyLaravelBladeKitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tweny-bladekit.php', 'tweny-bladekit');
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
            __DIR__ . '/../config/tweny-bladekit.php' => config_path('tweny-bladekit.php'),
        ], 'tweny-bladekit-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tweny-bladekit'),
        ], 'tweny-bladekit-views');
    }

    /**
     * Load views from the package.
     */
    private function bootResourcesViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tweny-bladekit');
    }

    /**
     * Compile Blade Components.
     */
    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            foreach (config('tweny-bladekit.components', []) as $alias => $component) {
                $blade->component($component, $alias);
            }
        });
    }
}