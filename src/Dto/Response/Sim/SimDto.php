<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Sim;

class SimDto
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

    private bool $inAppActivation = false;

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
     * @return SimDto
     */
    public function setIccid(string $iccid): SimDto
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
     * @return SimDto
     */
    public function setMatchingId(string $matchingId): SimDto
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
     * @return SimDto
     */
    public function setSmdpAddress(string $smdpAddress): SimDto
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
     * @return SimDto
     */
    public function setStatus(string $status): SimDto
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
     * @return SimDto
     */
    public function setHasInstalled(bool $hasInstalled): SimDto
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
     * @return SimDto
     */
    public function setRemainingCount(int $remainingCount): SimDto
    {
        $this->remainingCount = $remainingCount;
        return $this;
    }

    public function isInAppActivation(): bool
    {
        return $this->inAppActivation;
    }

    public function setInAppActivation(bool $inAppActivation): SimDto
    {
        $this->inAppActivation = $inAppActivation;
        return $this;
    }
}