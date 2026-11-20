namespace Modules\Identity\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3'],
            'last_name'  => ['required', 'string', 'min:3'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'min:8'],
        ];
    }

    public function firstName(): string
    {
        return $this->input('first_name');
    }

    public function lastName(): string
    {
        return $this->input('last_name');
    }

    public function email(): string
    {
        return $this->input('email');
    }

    public function password(): string
    {
        return $this->input('password');
    }
}
