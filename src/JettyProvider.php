<?php

namespace StubKit\Jetty;

use Illuminate\Support\ServiceProvider;
use StubKit\Jetty\Console\Commands\InstallCommand;

class JettyProvider extends ServiceProvider
{
    /**
     * Boot the provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->handlePublishingAssets();
    }

    /**
     * Register the provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register the publishables.
     *
     * @return void
     */
    public function handlePublishingAssets()
    {
        $this->publishes([
            __DIR__.'/../../config/stubkit.php' => config_path('stubkit.php'),
        ], 'jetty-config');

        $this->publishes([
            __DIR__.'/../stubs' => base_path('stubs'),
        ], 'jetty-stubs');

        $this->publishes([
            __DIR__.'/..resources/views' => resource_path('views/vendor/stubkit'),
        ], 'jetty-views');

        $this->publishes([
            __DIR__.'/..resources/js' => resource_path('js'),
        ], 'jetty-vue');
    }
}
