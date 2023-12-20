<?php

declare(strict_types=1);

namespace Esim\eSIMCoreClient\Dto\Request;

class PackageDetailsByPackageCodeRequest extends BaseRequest
{
    /**
     * @var string
     * @example GLOBAL1GB1DAYS
     */
    private string $packageCode;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getPackageCode(): string
    {
        return $this->packageCode;
    }

    /**
     * @param string $packageCode
     * @return PackageDetailsByPackageCodeRequest
     */
    public function setPackageCode(string $packageCode): PackageDetailsByPackageCodeRequest
    {
        $this->packageCode = $packageCode;
        return $this;
    }
}