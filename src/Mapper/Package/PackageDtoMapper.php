<?php

namespace eSIM\eSIMCoreClient\Mapper\Package;

use eSIM\eSIMCoreClient\Dto\Response\Package\PackageDto;
use eSIM\eSIMCoreClient\Helper\PriceHelper;

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
            ))
            ->setIsRecurring($package['isRecurring'])
            ->setTrialData($package['trialData'])
            ->setTrialDataUnit($package['trialDataUnit'])
            ->setTrialDuration($package['trialDuration'])
            ->setTrialDurationUnit($package['trialDurationUnit'])
            ->setTrialHlrBitRate($package['trialHlrBitRate']);
    }
}