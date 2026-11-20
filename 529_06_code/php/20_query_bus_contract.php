<?php

namespace Modules\Shared\Application\Bus;

interface QueryBus
{
    public function ask(object $query): mixed;
}
