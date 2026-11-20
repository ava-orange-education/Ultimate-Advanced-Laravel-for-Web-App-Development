<?php

namespace Modules\Shared\Application\Bus;

interface CommandBus
{
    public function dispatch(object $command): mixed;
}
