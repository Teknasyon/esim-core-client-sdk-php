<?php

namespace eSIM\eSIMCoreClient\Mapper\SimPackage;

use eSIM\eSIMCoreClient\Dto\Response\SimPackage\CurrentSimPackageDto;
use eSIM\eSIMCoreClient\Helper\PackageDetailHelper;
use eSIM\eSIMCoreClient\Helper\SimDetailHelper;

class CurrentSimPackageDtoMapper
{
    public static function map(array $currentSimPackage): CurrentSimPackageDto
    {
        return CurrentSimPackageDto::builder()
            ->setDataUsage($currentSimPackage['dataUsage'])
            ->setStatus($currentSimPackage['status'])
            ->setEndDate($currentSimPackage['endDate'])
            ->setExpiredDate($currentSimPackage['expiredDate'])
            ->setSimDetail(SimDetailHelper::createSimDetailSchema($currentSimPackage['simDetail']))
            ->setActivatedDate( $currentSimPackage['activatedDate'])
            ->setPackageDetail(PackageDetailHelper::createPackageDetailSchema($currentSimPackage['packageDetail']));
    }
}