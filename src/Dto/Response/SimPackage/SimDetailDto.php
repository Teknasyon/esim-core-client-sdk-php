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
    private int $remainingCount;

    /**
     * @var string|null
     */
    private ?string $lastCountry;

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
     * @return SimDetailDto
     */
    public function setIccid(string $iccid): SimDetailDto
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
     * @return SimDetailDto
     */
    public function setMatchingId(string $matchingId): SimDetailDto
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
     * @return SimDetailDto
     */
    public function setSmdpAddress(string $smdpAddress): SimDetailDto
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
     * @return SimDetailDto
     */
    public function setStatus(string $status): SimDetailDto
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
     * @return SimDetailDto
     */
    public function setHasInstalled(bool $hasInstalled): SimDetailDto
    {
        $this->hasInstalled = $hasInstalled;
        return $this;
    }

    /**
     * @return int
     */
    public function getRemainingCount(): int
    {
        return $this->remainingCount;
    }

    /**
     * @param int $remainingCount
     * @return SimDetailDto
     */
    public function setRemainingCount(int $remainingCount): SimDetailDto
    {
        $this->remainingCount = $remainingCount;
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
     * @return SimDetailDto
     */
    public function setLastCountry(?string $lastCountry): SimDetailDto
    {
        $this->lastCountry = $lastCountry;
        return $this;
    }
}