<?php

namespace Modules\Telemetry\Infrastructure\Observers;
use Carbon\Carbon;
use Modules\Telemetry\Infrastructure\Persistence\Mongo\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
final class AuditLogObserver
{
    public function updated(Model $model): void
    {
        AuditLog::create([
            'event' => 'model.updated',
            'actor_id' => auth()->id(),
            'payload' => [
                'model' => $model::class,
                'id' => $model->getKey(),
                'changes' => $model->getChanges(),
            ],
            'created_at' => Carbon::now(),
        ]);
    }
}
