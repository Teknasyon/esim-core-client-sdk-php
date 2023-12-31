<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Package;

use eSIM\eSIMCoreClient\Dto\Schema\Price;

class PackageDetailsDto
{
    private string $name;
    private int $data;
    private string $dataUnit;
    private int $duration;
    private string $durationUnit;
    private string $footprintCode;
    private string $footprintType;
    private string $provider;
    private string $code;
    private Price $price;

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
     * @return PackageDetailsDto
     */
    public function setName(string $name): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setData(int $data): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setDataUnit(string $dataUnit): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setDuration(int $duration): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setDurationUnit(string $durationUnit): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setFootprintCode(string $footprintCode): PackageDetailsDto
    {
        $this->footprintCode = $footprintCode;
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
     * @return PackageDetailsDto
     */
    public function setProvider(string $provider): PackageDetailsDto
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
     * @return PackageDetailsDto
     */
    public function setCode(string $code): PackageDetailsDto
    {
        $this->code = $code;
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
     * @return PackageDetailsDto
     */
    public function setFootprintType(string $footprintType): PackageDetailsDto
    {
        $this->footprintType = $footprintType;
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
     * @return PackageDetailsDto
     */
    public function setPrice(Price $price): PackageDetailsDto
    {
        $this->price = $price;
        return $this;
    }
}