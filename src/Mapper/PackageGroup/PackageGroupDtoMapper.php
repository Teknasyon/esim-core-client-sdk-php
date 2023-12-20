<?php

namespace Esim\eSIMCoreClient\Mapper\PackageGroup;

use Esim\eSIMCoreClient\Dto\Response\PackageGroup\PackageGroupDto;

class PackageGroupDtoMapper
{
    public static function map(array $packageGroup): PackageGroupDto
    {
        return PackageGroupDto::builder()
            ->setFootprintCode($packageGroup['footprintCode'])
            ->setFootprintType($packageGroup['footprintType'])
            ->setFootprints($packageGroup['footprints']);
    }
}