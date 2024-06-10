<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class OrderStatusCheckDto extends BaseRequest
{
    /**
     * @var string
     * @example 3868e07b-22b7-4464-96a3-2a9c31a13b76
     */
    private string $trackingNumber;

    /**
     * @var string
     * @example ACTIVATED
     */
    private string $status;

    /**
     * @var string
     * @example Y-m-d H:i:s
     */
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
     * @return OrderStatusCheckDto
     */
    public function setTrackingNumber(string $trackingNumber): OrderStatusCheckDto
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
     * @return OrderStatusCheckDto
     */
    public function setStatus(string $status): OrderStatusCheckDto
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
     * @return OrderStatusCheckDto
     */
    public function setExpirationDate(string $expirationDate): OrderStatusCheckDto
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }
}