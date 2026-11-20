namespace Modules\Identity\Application\QueryHandlers;

use Modules\Identity\Application\Queries\ListUsersQuery;
use Modules\Identity\Infrastructure\Persistence\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ListUsersHandler
{
    public function __invoke(ListUsersQuery $query): LengthAwarePaginator
    {
        return User::query()
            ->when(
                $query->email,
                fn ($builder) => $builder->where('email', $query->email)
            )
            ->orderBy($query->sort)
            ->paginate($query->perPage);
    }
}
