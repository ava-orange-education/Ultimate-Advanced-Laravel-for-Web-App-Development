<?php

namespace Modules\Shared\Infrastructure\Persistence;

use Closure;
use Illuminate\Database\DatabaseManager;

final class TransactionManager
{
    public function __construct(
        private readonly DatabaseManager $db,
    ) {}

    public function run(Closure $callback): mixed
    {
        return $this->db->transaction($callback);
    }
}
