<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;


use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class OrderStatusCheckRequest extends BaseRequest
{
    use ToArray, ToJSON;
    private string $trackingNumber;
    private string $status;
    private string $expirationDate;

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
     * @return OrderStatusCheckRequest
     */
    public function setTrackingNumber(string $trackingNumber): OrderStatusCheckRequest
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return OrderStatusCheckRequest
     */
    public function setStatus(string $status): OrderStatusCheckRequest
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     * @return OrderStatusCheckRequest
     */
    public function setExpirationDate(string $expirationDate): OrderStatusCheckRequest
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}