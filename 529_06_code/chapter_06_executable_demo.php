<?php

declare(strict_types=1);

final readonly class RegisterUserCommand
{
    public function __construct(
        public string $email,
        public string $password,
        public string $name,
    ) {}
}

final class UserRepository
{
    /** @var array<string, array{name:string,password:string}> */
    private array $users = [];

    public function existsByEmail(string $email): bool
    {
        return isset($this->users[$email]);
    }

    public function save(string $email, string $name, string $hashedPassword): string
    {
        $id = 'user_'.(count($this->users) + 1);
        $this->users[$email] = ['name' => $name, 'password' => $hashedPassword];
        return $id;
    }

    public function all(): array
    {
        return $this->users;
    }
}

final class RegisterUserHandler
{
    public function __construct(private UserRepository $users) {}

    public function __invoke(RegisterUserCommand $command): string
    {
        if ($this->users->existsByEmail($command->email)) {
            throw new DomainException('Email is already registered.');
        }

        return $this->users->save(
            $command->email,
            $command->name,
            password_hash($command->password, PASSWORD_BCRYPT)
        );
    }
}

final class CommandBus
{
    /** @param array<class-string, callable> $handlers */
    public function __construct(private array $handlers) {}

    public function dispatch(object $command): mixed
    {
        $commandClass = $command::class;
        $startedAt = microtime(true);

        echo "command.started: {$commandClass}\n";

        try {
            if (! isset($this->handlers[$commandClass])) {
                throw new RuntimeException("No handler registered for {$commandClass}");
            }

            $result = ($this->handlers[$commandClass])($command);
            $durationMs = (int) ((microtime(true) - $startedAt) * 1000);
            echo "command.succeeded: {$commandClass} ({$durationMs} ms)\n";
            return $result;
        } catch (Throwable $e) {
            $durationMs = (int) ((microtime(true) - $startedAt) * 1000);
            echo "command.failed: {$commandClass} ({$durationMs} ms) {$e->getMessage()}\n";
            throw $e;
        }
    }
}

$repository = new UserRepository();
$handler = new RegisterUserHandler($repository);
$bus = new CommandBus([
    RegisterUserCommand::class => $handler,
]);

$id = $bus->dispatch(new RegisterUserCommand(
    email: 'john@example.com',
    password: 'secret-password',
    name: 'John Doe'
));

echo "created_user_id: {$id}\n";
echo "registered_users: ".json_encode(array_keys($repository->all()), JSON_PRETTY_PRINT)."\n";
