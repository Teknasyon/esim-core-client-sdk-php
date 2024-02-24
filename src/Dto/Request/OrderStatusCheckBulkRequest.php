<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class OrderStatusCheckBulkRequest extends BaseRequest
{
    /**
     * @var OrderStatusCheckDto[]
     */
    private array $orders;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return OrderStatusCheckDto[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param OrderStatusCheckDto[] $orders
     * @return OrderStatusCheckBulkRequest
     */
    public function setOrders(array $orders): OrderStatusCheckBulkRequest
    {
        $this->orders = $orders;
        return $this;
    }

    public function addOrder(OrderStatusCheckDto $order): void
    {
        $this->orders[] = $order;
    }
}