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
    public function getTrackingNumber(): string
    {
        return $this->trackingNumber;
    }

    /**
     * @param string $trackingNumber
     * @return self
     */
    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;
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
     * @return self
     */
    public function setCustomParams(?array $customParams): self
    {
        $this->customParams = $customParams;
        return $this;
    }
}