<?php

interface CommandBus
{
    public function dispatch(object $command): mixed;

    public function dispatchMultiple(array $commands): void;
}
