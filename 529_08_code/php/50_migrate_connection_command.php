namespace Modules\Shared\Infrastructure\Console;

use Illuminate\Console\Command;

final class MigrateConnection extends Command
{
    protected $signature = 'migrate:connection {connection} {--force}';
    protected $description = 'Run migrations for a specific database connection across all modules';

    public function handle(): int
    {
        $connection = (string) $this->argument('connection');

        if (!array_key_exists($connection, (array) config('database.connections', []))) {
            $this->error("Unknown database connection: {$connection}");
            return self::FAILURE;
        }

        $modulePaths = glob(base_path('Modules/*'), GLOB_ONLYDIR);

        foreach ($modulePaths as $modulePath) {
            $path = $modulePath.'/Infrastructure/Persistence/Migrations/'.$connection;

            if (is_dir($path)) {
                $this->call('migrate', [
                    '--database' => $connection,
                    '--path'     => str_replace(base_path().DIRECTORY_SEPARATOR, '', $path),
                    '--force'    => $this->option('force'),
                ]);
            }
        }

        return self::SUCCESS;
    }
}