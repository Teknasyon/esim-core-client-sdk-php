<?php

namespace Esim\eSIMCoreClient\Mapper\Package;

use Esim\eSIMCoreClient\Dto\Response\Order\BalanceDto;

class BalanceDtoMapper
{
    public static function map(array $balance): BalanceDto
    {
        return BalanceDto::builder()
            ->setInitial($balance['initial'])
            ->setRemaining($balance['remaining'])
            ->setSpent($balance['spent']);
    }
}