namespace Modules\Identity\Presentation\GraphQL\Mutations;

use Modules\Identity\Application\Commands\CreateUserCommand;
use Modules\Identity\Infrastructure\Persistence\Eloquent\Models\UserModel;
use Modules\Shared\Application\Bus\CommandBus;

final class CreateUserResolver
{
    public function __construct(
        private readonly CommandBus $bus
    ) {}

    public function __invoke(mixed $root, array $args): UserModel
    {
        return $this->bus->dispatch(
            new CreateUserCommand(
                $args['first_name'],
                $args['last_name'],
                $args['email'],
                $args['password']
            )
        );
    }

}
