<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\PackageGroup;

class PackageGroupDto
{
    private string $footprintCode;
    private string $footprintType;
    private array $footprints;

    public static function builder(): static
    {
        return new static();
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
     * @return PackageGroupDto
     */
    public function setFootprintCode(string $footprintCode): PackageGroupDto
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
     * @return PackageGroupDto
     */
    public function setFootprintType(string $footprintType): PackageGroupDto
    {
        $this->footprintType = $footprintType;
        return $this;
    }

    /**
     * @return array
     */
    public function getFootprints(): array
    {
        return $this->footprints;
    }

    /**
     * @param array $footprints
     * @return PackageGroupDto
     */
    public function setFootprints(array $footprints): PackageGroupDto
    {
        $this->footprints = $footprints;
        return $this;
    }
}