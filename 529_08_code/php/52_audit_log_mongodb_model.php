namespace Modules\Telemetry\Infrastructure\Persistence\Mongo\Models;

use MongoDB\Laravel\Eloquent\Model;

final class AuditLog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'audit_logs';

    protected $fillable = [
        'event',
        'actor_id',
        'payload',
        'created_at',
    ];
}