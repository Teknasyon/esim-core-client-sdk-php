<?php

namespace eSIM\eSIMCoreClient\Mapper\Order;

use eSIM\eSIMCoreClient\Dto\Response\Order\BalanceCountryDto;
use eSIM\eSIMCoreClient\Dto\Response\Order\BalanceDetailDto;
use eSIM\eSIMCoreClient\Dto\Response\Order\BalanceDetailTodayDto;

class BalanceDetailDtoMapper
{
    public static function map(array $balance): BalanceDetailDto
    {
        return BalanceDetailDto::builder()
            ->setToday(
                BalanceDetailTodayDto::builder()
                    ->setData($balance['today']['data'] ?? 0)
                    ->setPrice($balance['today']['price'] ?? 0)
            )
            ->setCountries(self::mapCountries($balance['countries'] ?? []));
    }

    public static function mapCountries(array $countries): array
    {
        $response = [];
        if (!empty($countries)) {
            foreach ($countries as $country) {
                $response[] = BalanceCountryDto::builder()
                    ->setCode($country['code'] ?? '')
                    ->setData($country['data'] ?? 0)
                    ->setPrice($country['price'] ?? 0)
                    ->setYear($country['year'] ?? 0)
                    ->setMonth($country['month'] ?? 0)
                    ->setDay($country['day'] ?? null);
            }
        }
        return $response;
    }
}