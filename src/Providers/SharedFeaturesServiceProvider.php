<?php

namespace Perfexdev360\SharedFeatures\Providers;

use Illuminate\Support\ServiceProvider;

class SharedFeaturesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__.'/../../config/shared-features.php', 'shared-features'
        );

        $this->app->singleton(\Perfexdev360\SharedFeatures\Services\WhatsApp\WhatsAppClient::class, function ($app) {
            return new \Perfexdev360\SharedFeatures\Services\WhatsApp\WhatsAppClient();
        });

        $this->app->bind(\Perfexdev360\SharedFeatures\Contracts\AIGeneratorInterface::class, function ($app) {
            return new \Perfexdev360\SharedFeatures\Services\AI\AIBlogGenerator();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../../config/shared-features.php' => config_path('shared-features.php'),
        ], 'shared-features-config');

        // Load resources (views, lang, etc.)
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'shared-features');
        
        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/vendor/shared-features'),
        ], 'shared-features-views');

        // Load migrations if any
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        
        // Load routes if any
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }
}
