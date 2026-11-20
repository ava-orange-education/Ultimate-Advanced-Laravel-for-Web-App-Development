namespace Modules\Identity\Presentation\GraphQL\Queries;

use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use Modules\Identity\Application\Queries\ListUsersQuery;
use Modules\Shared\Application\Bus\QueryBus;

final class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
    ];

    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('User'));
    }

    public function resolve($root, $args)
    {
        return app(QueryBus::class)->ask(new ListUsersQuery());
    }
}
