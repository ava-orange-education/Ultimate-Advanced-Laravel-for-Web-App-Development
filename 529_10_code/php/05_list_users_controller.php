namespace Modules\Identity\Presentation\Http\Controllers\Users;

use Modules\Identity\Application\Queries\ListUsersQuery;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Shared\Application\Bus\QueryBus;
use Modules\Identity\Presentation\Http\Resources\UserResource;

final class ListUsersController
{
    public function __invoke(QueryBus $bus): AnonymousResourceCollection
    {
        $result = $bus->ask(new ListUsersQuery(perPage: 15));

        return UserResource::collection($result);
    }
}
