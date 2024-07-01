<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\SimPackage;

use eSIM\eSIMCoreClient\Dto\Schema\Price;

class PackageDetailDto
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $data;

    /**
     * @var string
     */
    private string $dataUnit;

    /**
     * @var int
     */
    private int $duration;

    /**
     * @var string
     */
    private string $durationUnit;

    /**
     * @var string
     */
    private string $footprintCode;

    /**
     * @var string
     */
    private string $footprintType;

    /**
     * @var string
     */
    private string $provider;

    /**
     * @var string
     */
    private string $code;

    /**
     * @var Price
     */
    private Price $price;

    /**
     * @var string|null
     */
    private ?string $lastActivationDate;

    /**
     * @var bool
     */
    private bool $isRecurring;

    /**
     * @var int
     */
    private int $trialData;

    /**
     * @var string
     */
    private string $trialDataUnit;

    /**
     * @var string
     */
    private string $trialDuration;

    /**
     * @var string
     */
    private string $trialDurationUnit;

    /**
     * @var string
     */
    private string $trialHlrBitRate;

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
     * @return PackageDetailDto
     */
    public function setName(string $name): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setData(int $data): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setDataUnit(string $dataUnit): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setDuration(int $duration): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setDurationUnit(string $durationUnit): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setFootprintCode(string $footprintCode): PackageDetailDto
    {
        $this->footprintCode = $footprintCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFootprintType(): string
    {
        return $this->footprintType;
    }

    /**
     * @param string $footprintType
     * @return PackageDetailDto
     */
    public function setFootprintType(string $footprintType): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setProvider(string $provider): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setCode(string $code): PackageDetailDto
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
     * @return PackageDetailDto
     */
    public function setPrice(Price $price): PackageDetailDto
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastActivationDate(): ?string
    {
        return $this->lastActivationDate;
    }

    /**
     * @param string|null $lastActivationDate
     * @return PackageDetailDto
     */
    public function setLastActivationDate(?string $lastActivationDate): PackageDetailDto
    {
        $this->lastActivationDate = $lastActivationDate;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRecurring(): bool
    {
        return $this->isRecurring;
    }

    /**
     * @param bool $isRecurring
     * @return PackageDetailDto
     */
    public function setIsRecurring(bool $isRecurring): PackageDetailDto
    {
        $this->isRecurring = $isRecurring;
        return $this;
    }

    /**
     * @return int
     */
    public function getTrialData(): int
    {
        return $this->trialData;
    }

    /**
     * @param int $trialData
     * @return PackageDetailDto
     */
    public function setTrialData(int $trialData): PackageDetailDto
    {
        $this->trialData = $trialData;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrialDataUnit(): string
    {
        return $this->trialDataUnit;
    }

    /**
     * @param string $trialDataUnit
     * @return PackageDetailDto
     */
    public function setTrialDataUnit(string $trialDataUnit): PackageDetailDto
    {
        $this->trialDataUnit = $trialDataUnit;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrialDuration(): string
    {
        return $this->trialDuration;
    }

    /**
     * @param string $trialDuration
     * @return PackageDetailDto
     */
    public function setTrialDuration(string $trialDuration): PackageDetailDto
    {
        $this->trialDuration = $trialDuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrialDurationUnit(): string
    {
        return $this->trialDurationUnit;
    }

    /**
     * @param string $trialDurationUnit
     * @return PackageDetailDto
     */
    public function setTrialDurationUnit(string $trialDurationUnit): PackageDetailDto
    {
        $this->trialDurationUnit = $trialDurationUnit;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrialHlrBitRate(): string
    {
        return $this->trialHlrBitRate;
    }

    /**
     * @param string $trialHlrBitRate
     * @return PackageDetailDto
     */
    public function setTrialHlrBitRate(string $trialHlrBitRate): PackageDetailDto
    {
        $this->trialHlrBitRate = $trialHlrBitRate;
        return $this;
    }
}