namespace Modules\Identity\Application\CommandHandlers;

use Modules\Identity\Application\Commands\CreateUserCommand;
use Modules\Identity\Domain\Entities\User;
use Modules\Identity\Domain\Repositories\UserRepository;


final class CreateUserHandler
{
    public function __construct(
        private readonly UserRepository $users
    ) {}

    public function __invoke(CreateUserCommand $command): void
    {
        $user = new User(
            $command->id,
            $command->email
        );

        $this->users->save($user);
    }
}