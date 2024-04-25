<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Package;

use eSIM\eSIMCoreClient\Dto\Schema\Price;
use eSIM\eSIMCoreClient\Enum\HLRBitRate;

class PackageDto
{
    private string $name;
    private int $data;
    private string $dataUnit;
    private int $duration;
    private string $durationUnit;
    private string $footprintCode;
    private array $footprints;
    private string $footprintType;
    private string $provider;
    private string $code;
    private Price $price;
    private bool $isRecurring = false;
    private ?int $trialData = null;
    private ?string $trialDataUnit = null;
    private ?string $trialDuration = null;
    private ?string $trialDurationUnit = null;
    private ?HLRBitRate $trialHlrBitRate = null;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PackageDto
     */
    public function setName(string $name): PackageDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getData(): int
    {
        return $this->data;
    }

    /**
     * @param int $data
     * @return PackageDto
     */
    public function setData(int $data): PackageDto
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getDataUnit(): string
    {
        return $this->dataUnit;
    }

    /**
     * @param string $dataUnit
     * @return PackageDto
     */
    public function setDataUnit(string $dataUnit): PackageDto
    {
        $this->dataUnit = $dataUnit;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return PackageDto
     */
    public function setDuration(int $duration): PackageDto
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return string
     */
    public function getDurationUnit(): string
    {
        return $this->durationUnit;
    }

    /**
     * @param string $durationUnit
     * @return PackageDto
     */
    public function setDurationUnit(string $durationUnit): PackageDto
    {
        $this->durationUnit = $durationUnit;
        return $this;
    }

    /**
     * @return string
     */
    public function getFootprintCode(): string
    {
        return $this->footprintCode;
    }

    /**
     * @param string $footprintCode
     * @return PackageDto
     */
    public function setFootprintCode(string $footprintCode): PackageDto
    {
        $this->footprintCode = $footprintCode;
        return $this;
    }

    /**
     * @return string
     */

    /**
     * @return array
     */
    public function getFootprints(): array
    {
        return $this->footprints;
    }

    /**
     * @param array $footprints
     * @return PackageDto
     */
    public function setFootprints(array $footprints): PackageDto
    {
        $this->footprints = $footprints;
        return $this;
    }

    public function getFootprintType(): string
    {
        return $this->footprintType;
    }

    /**
     * @param string $footprintType
     * @return PackageDto
     */
    public function setFootprintType(string $footprintType): PackageDto
    {
        $this->footprintType = $footprintType;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return PackageDto
     */
    public function setProvider(string $provider): PackageDto
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return PackageDto
     */
    public function setCode(string $code): PackageDto
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return PackageDto
     */
    public function setPrice(Price $price): PackageDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsRecurring(): bool
    {
        return $this->isRecurring;
    }

    /**
     * @param bool $isRecurring
     * @return PackageDto
     */
    public function setIsRecurring(bool $isRecurring): PackageDto
    {
        $this->isRecurring = $isRecurring;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrialData(): ?int
    {
        return $this->trialData;
    }

    /**
     * @param int|null $trialData
     * @return PackageDto
     */
    public function setTrialData(?int $trialData): PackageDto
    {
        $this->trialData = $trialData;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrialDataUnit(): ?string
    {
        return $this->trialDataUnit;
    }

    /**
     * @param string|null $trialDataUnit
     * @return PackageDto
     */
    public function setTrialDataUnit(?string $trialDataUnit): PackageDto
    {
        $this->trialDataUnit = $trialDataUnit;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrialDuration(): ?string
    {
        return $this->trialDuration;
    }

    /**
     * @param string|null $trialDuration
     * @return PackageDto
     */
    public function setTrialDuration(?string $trialDuration): PackageDto
    {
        $this->trialDuration = $trialDuration;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrialDurationUnit(): ?string
    {
        return $this->trialDurationUnit;
    }

    /**
     * @param string|null $trialDurationUnit
     * @return PackageDto
     */
    public function setTrialDurationUnit(?string $trialDurationUnit): PackageDto
    {
        $this->trialDurationUnit = $trialDurationUnit;
        return $this;
    }

    /**
     * @return HLRBitRate|null
     */
    public function getTrialHlrBitRate(): ?HLRBitRate
    {
        return $this->trialHlrBitRate;
    }

    /**
     * @param HLRBitRate|null $trialHlrBitRate
     * @return PackageDto
     */
    public function setTrialHlrBitRate(?HLRBitRate $trialHlrBitRate): PackageDto
    {
        $this->trialHlrBitRate = $trialHlrBitRate;
        return $this;
    }
}