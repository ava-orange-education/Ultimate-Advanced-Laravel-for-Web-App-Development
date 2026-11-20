final class LaravelTransactionManager implements TransactionManager
{
    public function run(callable $callback): mixed
    {
        return DB::transaction($callback);
    }
}