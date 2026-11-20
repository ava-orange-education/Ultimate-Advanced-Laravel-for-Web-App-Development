namespace Modules\Identity\Domain\Repositories;

use Modules\Identity\Domain\Entities\User;

interface UserRepository
{
    public function findById(string $id): ?User;

    public function findByEmail(string $email): ?User;

    public function save(User $user): void;
}