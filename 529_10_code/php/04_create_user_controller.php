namespace Modules\Identity\Presentation\Http\Controllers\Users;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Modules\Identity\Application\Commands\CreateUserCommand;
use Modules\Identity\Presentation\Http\Requests\CreateUserRequest;
use Modules\Identity\Presentation\Http\Resources\UserResource;
use Modules\Shared\Application\Bus\CommandBus;

final class CreateUserController
{
    public function __invoke(
        CreateUserRequest $request, 
        CommandBus $bus
    ): JsonResponse
    {
        $command = new CreateUserCommand(
            $request->firstName(),
            $request->lastName(),
            $request->email(),
            $request->password()
        );

        $user = $bus->dispatch($command);
  
        return UserResource::make($user)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);      
    }
}
