<?php

namespace Modules\Identity\Application\Handlers;

use Modules\Identity\Application\Queries\FindUserByEmailQuery;
use Modules\Identity\Infrastructure\ReadModels\UserReadModel;

final class FindUserByEmailHandler
{
    public function __construct(
        private UserReadModel $users
    ) {}

    public function handle(FindUserByEmailQuery $query): ?array
    {
        return $this->users->findByEmail($query->email);
    }
}
