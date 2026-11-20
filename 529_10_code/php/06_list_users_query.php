namespace Modules\Identity\Application\Queries;

final class ListUsersQuery
{
    public function __construct(
        public readonly ?string $email = null,
        public readonly string $sort = 'created_at',
        public readonly int $perPage = 15
    ) {}
}
