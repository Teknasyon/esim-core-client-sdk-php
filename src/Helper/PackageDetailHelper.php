<?php

namespace eSIM\eSIMCoreClient\Helper;

use eSIM\eSIMCoreClient\Dto\Response\SimPackage\PackageDetailDto;

class PackageDetailHelper
{
    public static function createPackageDetailSchema(array $package): PackageDetailDto
    {
        return
            PackageDetailDto::builder()
                ->setName($package['name'])
                ->setData($package['data'])
                ->setDataUnit($package['dataUnit'])
                ->setDuration($package['duration'])
                ->setDurationUnit($package['durationUnit'])
                ->setFootprintCode($package['footprintCode'])
                ->setFootprintType($package['footprintType'])
                ->setProvider($package['provider'])
                ->setCode($package['code'])
                ->setPrice(
                    PriceHelper::createPriceSchema(
                        price: $package['price']['price'],
                        currency: $package['price']['currency'],
                        priceText: $package['price']['priceText'],
                        currencySymbol: $package['price']['currencySymbol']
                    )
                )
                ->setLastActivationDate($package['lastActivationDate'])
                ->setIsRecurring($package['isRecurring'])
                ->setTrialData($package['trialData'])
                ->setTrialDataUnit($package['trialDataUnit'])
                ->setTrialDuration($package['trialDuration'])
                ->setTrialDurationUnit($package['trialDurationUnit'])
                ->setTrialHlrBitRate($package['trialHlrBitRate'])
                ->setGraceData($package['graceData'])
                ->setGraceDataUnit($package['graceDataUnit'])
                ->setGraceDuration($package['graceDuration'])
                ->setGraceDurationUnit($package['graceDurationUnit'])
                ->setGraceHlrBitRate($package['graceHlrBitRate']);
    }
}