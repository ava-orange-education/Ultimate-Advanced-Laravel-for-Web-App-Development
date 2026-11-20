<?php

declare(strict_types=1);

final class CannotShipUnpaidOrder extends RuntimeException {}
final class OrderAlreadyShipped extends RuntimeException {}
final class AccountAlreadyApproved extends RuntimeException {}
final class OrderAlreadyPaid extends RuntimeException {}

final class OrderStatus
{
    private function __construct(private string $value) {}

    public static function pending(): self { return new self('pending'); }
    public static function paid(): self { return new self('paid'); }
    public static function shipped(): self { return new self('shipped'); }

    public function isPaid(): bool { return $this->value === 'paid'; }
    public function isShipped(): bool { return $this->value === 'shipped'; }
    public function value(): string { return $this->value; }
}

final class OrderShipped
{
    public function __construct(public readonly string $orderId) {}
}

final class Order
{
    private array $events = [];

    public function __construct(
        private readonly string $id,
        private OrderStatus $status
    ) {}

    public function pay(): void
    {
        if ($this->status->isPaid()) {
            throw new OrderAlreadyPaid('The order is already paid.');
        }

        $this->status = OrderStatus::paid();
    }

    public function ship(): void
    {
        if (! $this->status->isPaid()) {
            throw new CannotShipUnpaidOrder('Cannot ship an unpaid order.');
        }

        if ($this->status->isShipped()) {
            throw new OrderAlreadyShipped('The order has already been shipped.');
        }

        $this->status = OrderStatus::shipped();
        $this->events[] = new OrderShipped($this->id);
    }

    public function status(): OrderStatus
    {
        return $this->status;
    }

    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }
}

final class Account
{
    private ?DateTimeImmutable $approvedAt = null;

    public function approve(): void
    {
        if ($this->isApproved()) {
            throw new AccountAlreadyApproved('Account is already approved.');
        }

        $this->approvedAt = new DateTimeImmutable('2026-01-01 10:00:00');
    }

    public function isApproved(): bool
    {
        return $this->approvedAt !== null;
    }
}

$lines = [];

$order = new Order('order-1001', OrderStatus::pending());

try {
    $order->ship();
} catch (CannotShipUnpaidOrder $exception) {
    $lines[] = 'Attempt 1: '.$exception->getMessage();
}

$order->pay();
$order->ship();
$events = $order->releaseEvents();

$lines[] = 'Attempt 2: order status is '.$order->status()->value().'.';
$lines[] = 'Domain events released: '.count($events).' ('.get_class($events[0]).').';

$account = new Account();
$lines[] = 'Account approved before approve(): '.($account->isApproved() ? 'yes' : 'no').'.';
$account->approve();
$lines[] = 'Account approved after approve(): '.($account->isApproved() ? 'yes' : 'no').'.';

foreach ($lines as $line) {
    echo $line.PHP_EOL;
}
