<?php

declare(strict_types=1);

namespace Esim\eSIMCoreClient\Dto\Request;

class BalanceRequest extends BaseRequest
{
    /**
     * @var string
     * @example 3868e07b-22b7-4464-96a3-2a9c31a13b76
     */
    private string $trackingNumber;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    /**
     * @param string $trackingNumber
     * @return BalanceRequest
     */
    public function setTrackingNumber(string $trackingNumber): BalanceRequest
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }
}