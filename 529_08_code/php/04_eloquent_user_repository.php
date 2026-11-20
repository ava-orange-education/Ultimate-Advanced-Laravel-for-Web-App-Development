namespace Modules\Identity\Infrastructure\Repositories;

use Modules\Identity\Domain\Repositories\UserRepository;
use Modules\Identity\Domain\Entities\User;
use Modules\Identity\Infrastructure\Persistence\Models\UserModel;

final class EloquentUserRepository implements UserRepository
{
    public function findById(string $id): ?User
    {
        $model = UserModel::find($id);

        return $model ? $this->mapToDomain($model) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $model = UserModel::where('email', $email)->first();

        return $model ? $this->mapToDomain($model) : null;
    }

    public function save(User $user): void
    {
        $model = UserModel::find($user->id) ?? new UserModel();

        $model->id = $user->id;
        $model->email = $user->email;

        $model->save();
    }

    private function mapToDomain(UserModel $model): User
    {
        return new User(
            $model->id,
            $model->email
        );
    }
}