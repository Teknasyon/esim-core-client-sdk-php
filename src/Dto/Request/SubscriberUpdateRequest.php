<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class SubscriberUpdateRequest extends BaseRequest
{
    /**
     * @var string
     * @example renewal
     */
    private string $eventType;

    /**
     * @var string
     * @example 3868e07b-22b7-4464-96a3-2a9c31a13b76
     */
    private string $trackingNumber;

    /**
     * @var string|null
     * @example 1575e07b-21b7-4364-96a3-2a9c31a13b74
     */
    private ?string $parentTrackingNumber = null;

    /**
     * @var array|null
     * @example ['customParameter1' => 'customValue1', 'customParameter2' => 'customValue2']
     */
    private ?array $customParams;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->eventType;
    }

    /**
     * @param string $eventType
     * @return SubscriberUpdateRequest
     */
    public function setEventType(string $eventType): SubscriberUpdateRequest
    {
        $this->eventType = $eventType;
        return $this;
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
     * @return SubscriberUpdateRequest
     */
    public function setTrackingNumber(string $trackingNumber): SubscriberUpdateRequest
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentTrackingNumber(): ?string
    {
        return $this->parentTrackingNumber;
    }

    /**
     * @param string|null $parentTrackingNumber
     * @return SubscriberUpdateRequest
     */
    public function setParentTrackingNumber(?string $parentTrackingNumber): SubscriberUpdateRequest
    {
        $this->parentTrackingNumber = $parentTrackingNumber;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getCustomParams(): ?array
    {
        return $this->customParams;
    }

    /**
     * @param array|null $customParams
     * @return SubscriberUpdateRequest
     */
    public function setCustomParams(?array $customParams): SubscriberUpdateRequest
    {
        $this->customParams = $customParams;
        return $this;
    }
}