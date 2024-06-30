<?php

namespace eSIM\eSIMCoreClient\Helper;

use eSIM\eSIMCoreClient\Dto\Response\SimPackage\SimDetailDto;

class SimDetailHelper
{
    public static function createSimDetailSchema(array $simDetail): SimDetailDto
    {
        return
            SimDetailDto::builder()
                ->setIccid($simDetail['iccid'])
                ->setMatchingId($simDetail['matchingId'])
                ->setSmdpAddress($simDetail['smdpAddress'])
                ->setStatus($simDetail['status'])
                ->setHasInstalled($simDetail['hasInstalled'])
                ->setReamingCount($simDetail['remainingCount'])
                ->setLastCountry($simDetail['lastCountry']);
    }
}