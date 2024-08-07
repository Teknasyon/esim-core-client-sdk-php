<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class CurrentSimPackageRequest extends BaseRequest
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
     * @return CurrentSimPackageRequest
     */
    public function setTrackingNumber(string $trackingNumber): CurrentSimPackageRequest
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }
}