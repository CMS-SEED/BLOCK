<?php

namespace Cms_Framework_Seed\Block;

use Illuminate\Support\ServiceProvider;

class BlockServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Load view
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'block');

        // Load translation
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'block');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Call pblish redources function
        $this->publishResources();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cms_framework_seed.block');
        
        // Bind facade
        $this->app->bind('block', function ($app) {
            return $this->app->make('Cms_Framework_Seed\Block\Block');
        });

        // Bind Category to repository
        $this->app->bind(
            'Cms_Framework_Seed\Block\Interfaces\CategoryRepositoryInterface',
            \Cms_Framework_Seed\Block\Repositories\Eloquent\CategoryRepository::class
        );

        // Bind Block to repository
        $this->app->bind(
            'Cms_Framework_Seed\Block\Interfaces\BlockRepositoryInterface',
            \Cms_Framework_Seed\Block\Repositories\Eloquent\BlockRepository::class
        );

        $this->app->register(\Cms_Framework_Seed\Block\Providers\AuthServiceProvider::class);
        $this->app->register(\Cms_Framework_Seed\Block\Providers\EventServiceProvider::class);
        $this->app->register(\Cms_Framework_Seed\Block\Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['block'];
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        // Publish configuration file
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('cms_framework_seed/block.php')], 'config');

        // Publish admin view
        $this->publishes([__DIR__ . '/../resources/views' => base_path('resources/views/vendor/block')], 'view');

        // Publish language files
        $this->publishes([__DIR__ . '/../resources/lang' => base_path('resources/lang/vendor/block')], 'lang');

        // Publish public
        $this->publishes([__DIR__ . '/../public/' => public_path('/')], 'public');
    }
}
