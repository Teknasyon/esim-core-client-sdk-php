<?php

namespace eSIM\eSIMCoreClient\Mapper\Sim;

use eSIM\eSIMCoreClient\Dto\Response\Sim\SimDto;

class SimMapper
{
    public static function map(array $sim): SimDto
    {
        return SimDto::builder()
            ->setIccid($sim['iccid'])
            ->setMatchingId($sim['matchingId'])
            ->setSmdpAddress($sim['smdpAddress'])
            ->setStatus($sim['status'])
            ->setHasInstalled($sim['hasInstalled'])
            ->setRemainingCount($sim['remainingCount'])
            ->setInAppActivation($sim['inAppActivation'] ?? false);
    }
}