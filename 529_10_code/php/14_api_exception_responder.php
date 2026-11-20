// Modules\Shared\Infrastructure\Exceptions\ApiExceptionResponder

final class ApiExceptionResponder
{
    public function render(Throwable $exception, Request $request): ?JsonResponse
    {
        if (! $this->shouldHandle($request)) {
            return null;
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
                'errors'  => $exception->errors(),
            ], $exception->status);
        }

        $statusCode = $exception instanceof HttpExceptionInterface
            ? $exception->getStatusCode()
            : JsonResponse::HTTP_INTERNAL_SERVER_ERROR;

        $payload = [
            'success' => false,
            'message' => $statusCode >= 500 && ! config('app.debug')
                ? 'Server Error'
                : $exception->getMessage(),
        ];

        if (config('app.debug')) {
            $payload['exception'] = $exception::class;
        }

        return response()->json($payload, $statusCode);
    }
}
