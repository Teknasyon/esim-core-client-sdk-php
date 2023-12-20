<?php

namespace Esim\eSIMCoreClient\Mapper\Order;

use Esim\eSIMCoreClient\Dto\Response\Order\OrderDto;

class OrderDtoMapper
{
    public static function map(array $order): OrderDto
    {
        return OrderDto::builder()
            ->setTrackingNumber($order['trackingNumber'])
            ->setSubscriberId($order['subscriberId'])
            ->setActivationDate($order['activationDate']);
    }
}