<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Order;

class OrderDto
{
    private string $trackingNumber;
    private ?string $subscriberId;
    private ?string $activationDate;

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
     * @return OrderDto
     */
    public function setTrackingNumber(string $trackingNumber): OrderDto
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSubscriberId(): ?string
    {
        return $this->subscriberId;
    }

    /**
     * @param string|null $subscriberId
     * @return OrderDto
     */
    public function setSubscriberId(?string $subscriberId): OrderDto
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getActivationDate(): ?string
    {
        return $this->activationDate;
    }

    /**
     * @param string|null $activationDate
     * @return OrderDto
     */
    public function setActivationDate(?string $activationDate): OrderDto
    {
        $this->activationDate = $activationDate;
        return $this;
    }
}