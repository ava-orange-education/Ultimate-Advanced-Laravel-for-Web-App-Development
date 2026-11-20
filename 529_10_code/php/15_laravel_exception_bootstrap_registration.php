->withExceptions(function (Exceptions $exceptions) {
    $exceptions->render(function (Throwable $e, Request $request) {
        return app(ApiExceptionResponder::class)->render($e, $request);
    });
})
