<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class CreateOrderRequest extends BaseRequest
{
    /**
     * @var string
     * @example GLOBAL1GB1DAYS
     */
    private string $packageCode;

    /**
     * @var string
     * @example test@test.com
     */
    private string $email;

    /**
     * @var string|null
     * @example Y-m-d H:i:s
     */
    private ?string $activationDate;

    /**
     * @var string|null
     * @example 3a649d72-d827-4c7a-8542-6e47f624991e (A v4 UUID contains a 122-bit random number.)
     */
    private ?string $subscriberId;

    /**
     * @var string|null
     * @example 4b649d72-d027-4p7a-8502-2e47f624u91e (A v4 UUID contains a 122-bit random number.)
     */
    private ?string $parentOrder;

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
    public function getPackageCode(): string
    {
        return $this->packageCode;
    }

    /**
     * @param string $packageCode
     * @return CreateOrderRequest
     */
    public function setPackageCode(string $packageCode): CreateOrderRequest
    {
        $this->packageCode = $packageCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return CreateOrderRequest
     */
    public function setEmail(string $email): CreateOrderRequest
    {
        $this->email = $email;
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
     * @return CreateOrderRequest
     */
    public function setActivationDate(?string $activationDate): CreateOrderRequest
    {
        $this->activationDate = $activationDate;
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
     * @return CreateOrderRequest
     */
    public function setSubscriberId(?string $subscriberId): CreateOrderRequest
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentOrder(): ?string
    {
        return $this->parentOrder;
    }

    /**
     * @param string|null $parentOrder
     * @return CreateOrderRequest
     */
    public function setParentOrder(?string $parentOrder): CreateOrderRequest
    {
        $this->parentOrder = $parentOrder;
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
     * @return CreateOrderRequest
     */
    public function setCustomParams(?array $customParams): CreateOrderRequest
    {
        $this->customParams = $customParams;
        return $this;
    }
}