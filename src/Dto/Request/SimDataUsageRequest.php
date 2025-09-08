<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class SimDataUsageRequest extends BaseRequest
{
    /**
     * @var string
     * @example 123456789012345
     */
    private string $iccid;

    /**
     * @var string
     * @example 2023-01-01 00:00:00 (Y-m-d H:i:s)
     */
    private string $startDate;

    /**
     * @var string
     * @example 2025-01-01 00:00:00 (Y-m-d H:i:s)
     */
    private string $endDate;

    public static function builder(): static
    {
        return new static();
    }

    public function getIccid(): string
    {
        return $this->iccid;
    }

    public function setIccid(string $iccid): void
    {
        $this->iccid = $iccid;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }
}