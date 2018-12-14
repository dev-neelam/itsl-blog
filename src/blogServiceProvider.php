<?php

namespace itsl\blog;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class blogServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'itsl');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'itsl');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Load the standard routes file for the application.
     *
     * @param  string  $path
     * @return mixed
     */
    protected function loadRoutesFrom($path)
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => 'itsl\blog\Http\Controllers'
        ], function ($router) use ($path) {
            require $path;
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/blog.php', 'blog');

        // Register the service the package provides.
        $this->app->singleton('blog', function ($app) {
            return new blog;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['blog'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/blog.php' => config_path('blog.php'),
        ], 'blog.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/vendor/itsl'),
        ], 'blog.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/public/css' => public_path('css'),
        ], 'blog.assets');

        $this->publishes([
            __DIR__.'/public/js' => public_path('js'),
        ], 'blog.assets');

        // Publishing the migration files.
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'blog.migrations');

        // Publishing the model files.
        $this->publishes([
            __DIR__.'/app' => base_path('app'),
        ], 'blog.migrations');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang/vendor/itsl'),
        ], 'blog.views');*/

        // Registering package commands.
        $this->commands([]);
    }
}
