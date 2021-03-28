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

        $this->replaceInFile(
            '// protected $namespace',
            'protected $namespace',
            app_path('Providers/RouteServiceProvider.php')
        );

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

        $search = '->group(base_path(\'routes/web.php\'));';
        $replace = "->group(base_path('routes/web.php'));\n\n";
        $replace .= "\t\t\tRoute::middleware(['web', 'auth:sanctum', 'verified'])
            \t->namespace(\$this->namespace)
            \t->group(base_path('routes/auth.php'));";

        $this->replaceInFile($search, $replace, app_path('Providers/RouteServiceProvider.php'));
    }
    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
