namespace Modules\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

abstract class ModuleServiceProvider extends ServiceProvider
{
    abstract protected function moduleName(): string;

    public function boot(): void
    {
        $moduleName = $this->moduleName();
        $modulePath = base_path('Modules/'.$moduleName);
        
        $this->registerMigrations($modulePath);
        
        // Add other registrations (views, routes, etc.)
    }
    
    protected function registerMigrations(string $modulePath): void
    {
        $migrationsRoot = $modulePath.'/Infrastructure/Persistence/Migrations';

        if (!is_dir($migrationsRoot)) {
            return;
        }

        $defaultConnection = config('database.default');  // e.g. 'mysql'
        $connections = array_keys(config('database.connections', []));

        // If default connection is not defined in config, do nothing
        if ($defaultConnection === '' || !in_array($defaultConnection, $connections, true)) {
            return;
        }

        $defaultPath = $migrationsRoot.'/'.$defaultConnection;

        if (is_dir($defaultPath)) {
            $this->loadMigrationsFrom($defaultPath);
        }
    }
}