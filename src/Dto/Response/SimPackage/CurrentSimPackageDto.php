<?php
declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\SimPackage;
/**
 *
 */
class CurrentSimPackageDto
{
    /**
     * @var float
     */
    private float $dataUsage;
    /**
     * @var string
     */
    private string $status;
    /**
     * @var string
     */
    private string $activatedDate;
    /**
     * @var string|null
     */
    private ?string $endDate;
    /**
     * @var string
     */
    private string $expiredDate;
    /**
     * @var SimDetailDto
     */
    private SimDetailDto $simDetail;
    /**
     * @var PackageDetailDto
     */
    private PackageDetailDto $packageDetailDto;

    /**
     * @return static
     */
    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return float
     */
    public function getDataUsage(): float
    {
        return $this->dataUsage;
    }

    /**
     * @param float $dataUsage
     * @return $this
     */
    public function setDataUsage(float $dataUsage): self
    {
        $this->dataUsage = $dataUsage;
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
     * @return string
     */
    public function getActivatedDate(): string
    {
        return $this->activatedDate;
    }

    /**
     * @param string $activatedDate
     * @return $this
     */
    public function setActivatedDate(string $activatedDate): self
    {
        $this->activatedDate = $activatedDate;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    /**
     * @param string|null $endDate
     * @return $this
     */
    public function setEndDate(?string $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiredDate(): string
    {
        return $this->expiredDate;
    }

    /**
     * @param string $expiredDate
     * @return $this
     */
    public function setExpiredDate(string $expiredDate): self
    {
        $this->expiredDate = $expiredDate;
        return $this;
    }

    /**
     * @return SimDetailDto
     */
    public function getSimDetail(): SimDetailDto
    {
        return $this->simDetail;
    }

    /**
     * @param SimDetailDto $simDetail
     * @return $this
     */
    public function setSimDetail(SimDetailDto $simDetail): self
    {
        $this->simDetail = $simDetail;
        return $this;
    }

    /**
     * @return PackageDetailDto
     */
    public function getPackageDetailDto(): PackageDetailDto
    {
        return $this->packageDetailDto;
    }

    /**
     * @param PackageDetailDto $packageDetailDto
     * @return self
     */
    public function setPackageDetailDto(PackageDetailDto $packageDetailDto): self
    {
        $this->packageDetailDto = $packageDetailDto;
        return $this;
    }


}