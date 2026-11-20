final class CreateOrderHandler
{
    public function __construct(
        private readonly OrderRepository $orders
    ) {}

    public function __invoke(CreateOrderCommand $command): void
    {
        DB::transaction(function () use ($command) {
            // orchestrate domain operations
        });
    }
}