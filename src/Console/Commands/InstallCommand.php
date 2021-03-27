<?php

namespace StubKit\Jetty\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jetty:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install StubKit & Jetty';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('stubkit:install');

        $this->installAuthRoutes();

        $this->comment('Publishing Jetty Configuration...');
        $this->comment('Publishing Jetty Views...');
        $this->comment('Publishing Jetty Stubs...');

        $this->callSilent('vendor:publish', ['--tag' => 'jetty-config', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'jetty-views', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'jetty-vue', '--force' => true]);
        $this->callSilent('vendor:publish', ['--tag' => 'jetty-stubs', '--force' => true]);

        return 1;
    }
    /**
     * Install the auth routes in provider
     *
     * @return void
     */
    protected function installAuthRoutes()
    {
        file_put_contents(base_path('routes/auth.php'), "<?php\n");

        $web = "Route::middleware('web')
            ->namespace(\$this->namespace)
            ->group(base_path('routes/web.php'));";

        $webAndAuth = "Route::middleware('web')
            ->namespace(\$this->namespace)
            ->group(base_path('routes/web.php'));\n";

        $webAndAuth .= "Route::middleware(['web', 'auth:sanctum', 'verified'])
            ->namespace(\$this->namespace)
            ->group(base_path('routes/auth.php'));";

        $provider = file_get_contents(app_path('Providers/RouteServiceProvider.php'));

        file_put_contents(
            app_path('Providers/RouteServiceProvider.php'),
            str_replace($web, $webAndAuth, $provider)
        );
    }
}
