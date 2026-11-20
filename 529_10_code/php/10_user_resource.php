namespace Modules\Identity\Presentation\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => (string) $this->id,

            // Computed field
            'full_name' => sprintf(
                '%s %s',
                $this->first_name,
                $this->last_name
            ),

            'email' => $this->email,

            'created_at' => $this->created_at?->toISOString(),

            // Conditional attribute
            'email_verified_at' => $this->when(
                $this->email_verified_at !== null,
                $this->email_verified_at?->toISOString()
            ),
        ];
    }
}
