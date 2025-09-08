<?php

namespace eSIM\eSIMCoreClient\Dto\Response\Sim;


use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class SimTotalDataUsageDto
{
    use ToArray;
    use ToJSON;

    /**
     * @var string
     */
    private string $totalDataUsage;

    /**
     * @var string
     */
    private string $totalCost;

    /**
     * @var string
     */
    private string $countryCode;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return string
     */
    public function getTotalDataUsage(): string
    {
        return $this->totalDataUsage;
    }

    /**
     * @param string $totalDataUsage
     * @return SimTotalDataUsageDto
     */
    public function setTotalDataUsage(string $totalDataUsage): SimTotalDataUsageDto
    {
        $this->totalDataUsage = $totalDataUsage;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalCost(): string
    {
        return $this->totalCost;
    }

    /**
     * @param string $totalCost
     * @return SimTotalDataUsageDto
     */
    public function setTotalCost(string $totalCost): SimTotalDataUsageDto
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return SimTotalDataUsageDto
     */
    public function setCountryCode(string $countryCode): SimTotalDataUsageDto
    {
        $this->countryCode = $countryCode;
        return $this;
    }
}
