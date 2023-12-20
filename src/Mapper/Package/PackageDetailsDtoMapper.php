<?php

namespace Esim\eSIMCoreClient\Mapper\Package;

use Esim\eSIMCoreClient\Dto\Response\Package\PackageDetailsDto;
use Esim\eSIMCoreClient\Helper\PriceHelper;

class PackageDetailsDtoMapper
{
    public static function map(array $packageDetails): PackageDetailsDto
    {
        return PackageDetailsDto::builder()
            ->setName($packageDetails['name'])
            ->setData($packageDetails['data'])
            ->setDataUnit($packageDetails['dataUnit'])
            ->setDuration($packageDetails['duration'])
            ->setDurationUnit($packageDetails['durationUnit'])
            ->setFootprintCode($packageDetails['footprintCode'])
            ->setFootprintType($packageDetails['footprintType'])
            ->setProvider($packageDetails['provider'])
            ->setCode($packageDetails['code'])
            ->setPrice(PriceHelper::createPriceSchema(
                $packageDetails['price']['price'],
                $packageDetails['price']['currency'],
                $packageDetails['price']['priceText'],
                $packageDetails['price']['currencySymbol']
            ));
    }
}
