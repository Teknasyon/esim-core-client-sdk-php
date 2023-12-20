<?php

namespace Esim\eSIMCoreClient\Mapper\Package;

use Esim\eSIMCoreClient\Dto\Response\Package\PackageDto;
use Esim\eSIMCoreClient\Helper\PriceHelper;

class PackageDtoMapper
{
    public static function map(array $package): PackageDto
    {
        return PackageDto::builder()
            ->setName($package['name'])
            ->setData($package['data'])
            ->setDataUnit($package['dataUnit'])
            ->setDuration($package['duration'])
            ->setDurationUnit($package['durationUnit'])
            ->setFootprintCode($package['footprintCode'])
            ->setFootprints($package['footprints'])
            ->setFootprintType($package['footprintType'])
            ->setProvider($package['provider'])
            ->setCode($package['code'])
            ->setPrice(PriceHelper::createPriceSchema(
                $package['price']['price'],
                $package['price']['currency'],
                $package['price']['priceText'],
                $package['price']['currencySymbol']
            ));
    }
}