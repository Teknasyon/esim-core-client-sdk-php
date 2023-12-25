<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

class PackagesByFootprintCodeRequest extends BaseRequest
{
    /**
     * @var string
     * @example GLOBAL
     */
    private string $footprintCode;

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
     * @return PackagesByFootprintCodeRequest
     */
    public function setFootprintCode(string $footprintCode): PackagesByFootprintCodeRequest
    {
        $this->footprintCode = $footprintCode;
        return $this;
    }
}