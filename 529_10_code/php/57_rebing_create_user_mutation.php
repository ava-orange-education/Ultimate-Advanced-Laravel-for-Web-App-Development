namespace Modules\Identity\Presentation\GraphQL\Mutations;

use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Modules\Identity\Application\Commands\CreateUserCommand;
use Modules\Shared\Application\Bus\CommandBus;

final class CreateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createUser',
    ];

    public function type(): Type
    {
        return \GraphQL::type('User');
    }

    public function args(): array
    {
        return [
            'first_name' => ['type' => Type::nonNull(Type::string())],
            'last_name'  => ['type' => Type::nonNull(Type::string())],
            'email'      => ['type' => Type::nonNull(Type::string())],
            'password'   => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function resolve($root, $args)
    {
        return app(CommandBus::class)->dispatch(
            new CreateUserCommand(
                $args['first_name'],
                $args['last_name'],
                $args['email'],
                $args['password']
            )
        );
    }
}
