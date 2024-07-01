<?php
declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\SimPackage;

class SimDetailDto
{
    /**
     * @var string
     */
    private string $iccid;
    /**
     * @var string
     */
    private string $matchingId;
    /**
     * @var string
     */
    private string $smdpAddress;
    /**
     * @var string
     */
    private string $status;
    /**
     * @var bool
     */
    private bool $hasInstalled;
    /**
     * @var int
     */
    private int $remaining;
    /**
     * @var string|null
     */
    private ?string $lastCountry;

    /**
     * @return static
     */
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
     * @return $this
     */
    public function setIccid(string $iccid): self
    {
        $this->iccid = $iccid;
        return $this;
    }

    /**
     * @return string
     */
    public function getMatchingId(): string
    {
        return $this->matchingId;
    }

    /**
     * @param string $matchingId
     * @return $this
     */
    public function setMatchingId(string $matchingId): self
    {
        $this->matchingId = $matchingId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSmdpAddress(): string
    {
        return $this->smdpAddress;
    }

    /**
     * @param string $smdpAddress
     * @return $this
     */
    public function setSmdpAddress(string $smdpAddress): self
    {
        $this->smdpAddress = $smdpAddress;
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
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHasInstalled(): bool
    {
        return $this->hasInstalled;
    }

    /**
     * @param bool $hasInstalled
     * @return $this
     */
    public function setHasInstalled(bool $hasInstalled): self
    {
        $this->hasInstalled = $hasInstalled;
        return $this;
    }

    /**
     * @return int
     */
    public function getRemainingCount(): int
    {
        return $this->remaining;
    }

    /**
     * @param int $remaining
     * @return $this
     */
    public function setRemainingCount(int $remaining): self
    {
        $this->remaining = $remaining;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastCountry(): ?string
    {
        return $this->lastCountry;
    }

    /**
     * @param string|null $lastCountry
     * @return $this
     */
    public function setLastCountry(?string $lastCountry): self
    {
        $this->lastCountry = $lastCountry;
        return $this;
    }


}