<?php

namespace eSIM\eSIMCoreClient\Mapper\Sim;


use eSIM\eSIMCoreClient\Dto\Response\Sim\SimDetailDto;

class SimDetailDtoMapper
{
    /**
     * @param array $sim
     * @return SimDetailDto
     */
    public static function map(array $sim): SimDetailDto
    {
        return SimDetailDto::builder()
            ->setIccid($sim['iccid'])
            ->setMatchingId($sim['matchingId'])
            ->setSmdpAddress($sim['smdpAddress'])
            ->setStatus($sim['status'])
            ->setHasInstalled($sim['hasInstalled'])
            ->setLastCountry($sim['lastCountry'])
            ->setRemainingCount($sim['remainingCount'])
            ->setIsOneSim($sim['isOneSim'])
            ->setBalance($sim['balance']);
    }
}