<?php
declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;
class SimChangeRequest extends BaseRequest
{
    public static function builder(): self
    {
        return new self();
    }

    /**
     * @var string
     */
    private string $iccid;
    /**
     * @var string
     */
    private string $subscriberId;

    /**
     * @return string
     */
    public function getIccid(): string
    {
        return $this->iccid;
    }

    /**
     * @param string $iccid
     * @return $this
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
     * @return $this
     */
    public function setSubscriberId(string $subscriberId): SimChangeRequest
    {
        $this->subscriberId = $subscriberId;
        return $this;
    }
}