<?php

namespace eSIM\eSIMCoreClient\Mapper\Package;

use eSIM\eSIMCoreClient\Dto\Response\Package\PackageDetailsDto;
use eSIM\eSIMCoreClient\Enum\HLRBitRate;
use eSIM\eSIMCoreClient\Helper\PriceHelper;

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
            ->setLastActivationDate($packageDetails['lastActivationDate'])
            ->setPrice(PriceHelper::createPriceSchema(
                $packageDetails['price']['price'],
                $packageDetails['price']['currency'],
                $packageDetails['price']['priceText'],
                $packageDetails['price']['currencySymbol']
            ))
            ->setIsRecurring($packageDetails['isRecurring'])
            ->setTrialData($packageDetails['trialData'])
            ->setTrialDataUnit($packageDetails['trialDataUnit'])
            ->setTrialDuration($packageDetails['trialDuration'])
            ->setTrialDurationUnit($packageDetails['trialDurationUnit'])
            ->setTrialHlrBitRate($packageDetails['trialHlrBitRate'] ? HLRBitRate::from($packageDetails['trialHlrBitRate']) : null);
    }
}
