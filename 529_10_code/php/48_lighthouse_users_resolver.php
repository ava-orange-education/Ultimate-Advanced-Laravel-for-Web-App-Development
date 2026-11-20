namespace Modules\Identity\Presentation\GraphQL\Queries;

use Modules\Identity\Application\Queries\ListUsersQuery;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\Shared\Application\Bus\QueryBus;

final class UsersResolver
{
    public function __construct(
        private readonly QueryBus $bus
    ) {}

    public function __invoke(): LengthAwarePaginator
    {
        return $this->bus->ask(new ListUsersQuery());
    }
}
