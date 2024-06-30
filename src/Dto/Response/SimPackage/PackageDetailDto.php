<?php
declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\SimPackage;

use eSIM\eSIMCoreClient\Helper\Price;

/**
 *
 */
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
     * @var \eSIM\eSIMCoreClient\Dto\Schema\Price
     */
    private \eSIM\eSIMCoreClient\Dto\Schema\Price $price;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
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
     * @return $this
     */
    public function setData(int $data): self
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
     * @return $this
     */
    public function setDataUnit(string $dataUnit): self
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
     * @return $this
     */
    public function setDuration(int $duration): self
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
     * @return $this
     */
    public function setDurationUnit(string $durationUnit): self
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
     * @return $this
     */
    public function setFootprintCode(string $footprintCode): self
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
     * @return $this
     */
    public function setFootprintType(string $footprintType): self
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
     * @return $this
     */
    public function setProvider(string $provider): self
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
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return \eSIM\eSIMCoreClient\Dto\Schema\Price
     */
    public function getPrice(): \eSIM\eSIMCoreClient\Dto\Schema\Price
    {
        return $this->price;
    }

    /**
     * @param \eSIM\eSIMCoreClient\Dto\Schema\Price $price
     * @return $this
     */
    public function setPrice(\eSIM\eSIMCoreClient\Dto\Schema\Price $price): self
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
     * @return $this
     */
    public function setLastActivationDate(?string $lastActivationDate): self
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
     * @return $this
     */
    public function setIsRecurring(bool $isRecurring): self
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
     * @return $this
     */
    public function setTrialData(int $trialData): self
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
     * @return $this
     */
    public function setTrialDataUnit(string $trialDataUnit): self
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
     * @return $this
     */
    public function setTrialDuration(string $trialDuration): self
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
     * @return $this
     */
    public function setTrialDurationUnit(string $trialDurationUnit): self
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
     * @return $this
     */
    public function setTrialHlrBitRate(string $trialHlrBitRate): self
    {
        $this->trialHlrBitRate = $trialHlrBitRate;
        return $this;
    }


}