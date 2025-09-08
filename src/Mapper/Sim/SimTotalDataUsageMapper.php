<?php

namespace eSIM\eSIMCoreClient\Mapper\Sim;


use eSIM\eSIMCoreClient\Dto\Response\Sim\SimTotalDataUsageDto;

class SimTotalDataUsageMapper
{
    /**
     * @param string $totalDataUsage
     * @param string $totalCost
     * @param string $countryCode
     * @return SimTotalDataUsageDto
     */
    public static function map(string $totalDataUsage, string $totalCost, string $countryCode): SimTotalDataUsageDto
    {
        return SimTotalDataUsageDto::builder()
            ->setTotalDataUsage($totalDataUsage)
            ->setTotalCost($totalCost)
            ->setCountryCode($countryCode);
    }
}
