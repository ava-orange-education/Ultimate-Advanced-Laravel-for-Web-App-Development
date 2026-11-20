namespace Modules\Telemetry\Infrastructure\Persistence\Dynamo;

use Aws\DynamoDb\DynamoDbClient;

final class DynamoClientFactory
{
    public static function make(): DynamoDbClient
    {
        return new DynamoDbClient([
            'region'      => config('database.dynamodb.region'),
            'version'     => config('database.dynamodb.version'),
            'credentials' => config('database.dynamodb.credentials'),
        ]);
    }
}