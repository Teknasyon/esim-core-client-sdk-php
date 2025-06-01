<?php

namespace eSIM\eSIMCoreClient\Mapper\SimPackage;

use eSIM\eSIMCoreClient\Dto\Response\SimPackage\CurrentSimPackageDto;
use eSIM\eSIMCoreClient\Helper\PackageDetailHelper;
use eSIM\eSIMCoreClient\Helper\SimDetailHelper;

class CurrentSimPackageDtoMapper
{
    /**
     * @param array $currentSimPackage
     * @return CurrentSimPackageDto
     */
    public static function map(array $currentSimPackage): CurrentSimPackageDto
    {
        return CurrentSimPackageDto::builder()
            ->setType($currentSimPackage['type'])
            ->setDataUsage($currentSimPackage['dataUsage'])
            ->setStatus($currentSimPackage['status'])
            ->setActivatedDate($currentSimPackage['activatedDate'])
            ->setEndDate($currentSimPackage['endDate'])
            ->setExpiredDate($currentSimPackage['expiredDate'])
            ->setUpdatedDate($currentSimPackage['updatedDate'])
            ->setSimDetail(SimDetailHelper::createSimDetailSchema($currentSimPackage['simDetail']))
            ->setPackageDetail(PackageDetailHelper::createPackageDetailSchema($currentSimPackage['packageDetail']));
    }
}