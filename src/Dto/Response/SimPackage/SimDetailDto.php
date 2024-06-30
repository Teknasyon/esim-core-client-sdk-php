<?php
declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\SimPackage;
class SimDetailDto
{

    private string $iccid;
    private string $matchingId;
    private string $smdpAddress;
    private string $status;
    private bool $hasInstalled;
    private int $reamingCount;
    private ?string $lastCountry;

    public static function builder(): static
    {
        return new static();
    }

    public function getIccid(): string
    {
        return $this->iccid;
    }

    public function setIccid(string $iccid): self
    {
        $this->iccid = $iccid;
        return $this;
    }

    public function getMatchingId(): string
    {
        return $this->matchingId;
    }

    public function setMatchingId(string $matchingId): self
    {
        $this->matchingId = $matchingId;
        return $this;
    }

    public function getSmdpAddress(): string
    {
        return $this->smdpAddress;
    }

    public function setSmdpAddress(string $smdpAddress): self
    {
        $this->smdpAddress = $smdpAddress;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function isHasInstalled(): bool
    {
        return $this->hasInstalled;
    }

    public function setHasInstalled(bool $hasInstalled): self
    {
        $this->hasInstalled = $hasInstalled;
        return $this;
    }

    public function getReamingCount(): int
    {
        return $this->reamingCount;
    }

    public function setReamingCount(int $reamingCount): self
    {
        $this->reamingCount = $reamingCount;
        return $this;
    }

    public function getLastCountry(): ?string
    {
        return $this->lastCountry;
    }

    public function setLastCountry(?string $lastCountry): self
    {
        $this->lastCountry = $lastCountry;
        return $this;
    }


}