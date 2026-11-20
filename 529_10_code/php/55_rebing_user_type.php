namespace Modules\Identity\Presentation\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

final class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user in the system',
        'model' => \Modules\Identity\Infrastructure\Persistence\Eloquent\Models\UserModel::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
            ],
            'fullName' => [
                'type' => Type::string(),
                'resolve' => fn ($root) => $root->first_name.' '.$root->last_name,
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
        ];
    }
}
