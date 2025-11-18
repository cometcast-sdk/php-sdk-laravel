<?php

namespace Cometcast\OpenApi\Laravel;

use Cometcast\Openapi\HttpClient\OpenApiHttpClientFactory;
use Cometcast\Openapi\OpenIdProvider;
use Illuminate\Support\ServiceProvider;

class PhpSdkLaravelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'php-sdk-laravel');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'php-sdk-laravel');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('cometcast-openapi.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/php-sdk-laravel'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/php-sdk-laravel'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/php-sdk-laravel'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cometcast-openapi');

        // Register the main class to use with the facade
        $this->app->singleton(OpenIdProvider::class, function ($app) {
            $config = $app['config']->get('cometcast-openapi.oidc');
            return new OpenIdProvider($config);
        });

        $this->app->singleton(OpenApiHttpClientFactory::class, function ($app) {
            $factory =  new OpenApiHttpClientFactory(
                $app['config']->get('cometcast-openapi.openapi_base_url')
            );

            $factory->setSSLVerify($app['config']->get('cometcast-openapi.openapi_ssl_verify'));

            return $factory;
        });
    }
}
