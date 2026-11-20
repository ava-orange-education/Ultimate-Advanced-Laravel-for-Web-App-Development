<?php

final class LaravelCommandBus implements CommandBus
{
    public function __construct(
        private readonly CommandHandlerLocator $locator,
        private readonly TransactionManager $tx,
    ) {}

    public function dispatch(object $command): mixed
    {
        $handler = $this->locator->resolveFor($command);

        return $this->tx->run(
            fn () => $handler($command)
        );
    }

    public function dispatchMultiple(array $commands): void
    {
        $this->tx->run(function () use ($commands) {
            foreach ($commands as $command) {
                $handler = $this->locator->resolveFor($command);
                $handler($command);
            }
        });
    }
}
