<?php

declare(strict_types=1);

namespace Esim\eSIMCoreClient\Dto\Response\Package;

use Esim\eSIMCoreClient\Dto\Schema\Price;

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
}