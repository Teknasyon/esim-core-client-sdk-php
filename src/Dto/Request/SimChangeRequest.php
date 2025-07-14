<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class SimChangeRequest extends BaseRequest
{
    /**
     * @var string
     * @example 123456789012345
     */
    private string $iccid;

    /**
     * @var string
     * @example 3a649d72-d827-4c7a-8542-6e47f624991e (A v4 UUID contains a 122-bit random number.)
     */
    private string $subscriberId;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getIccid(): string
    {
        return $this->iccid;
    }

    /**
     * @param string $iccid
     * @return SimChangeRequest
     */
    public function setIccid(string $iccid): SimChangeRequest
    {
        $this->iccid = $iccid;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriberId(): string
    {
        return $this->subscriberId;
    }

    /**
     * @param string $subscriberId
     * @return SimChangeRequest
     */
    public function setSubscriberId(string $subscriberId): SimChangeRequest
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }
}