<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class OrderStatusCheckBulkRequest extends BaseRequest
{
    use ToArray, ToJSON;
    private array $orders;

    public static function builder(): static
    {
        return new static();
    }

    public function getOrders(): array
    {
        return $this->orders;
    }

    public function setOrders(array $orders): void
    {
        $this->orders = $orders;
    }

    public function addOrder(OrderStatusCheckRequest $orders): void
    {
        $this->orders[] = $orders;
    }
}