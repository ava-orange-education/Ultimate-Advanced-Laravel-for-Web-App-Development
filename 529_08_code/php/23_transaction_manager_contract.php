interface TransactionManager
{
    public function run(callable $callback): mixed;
}