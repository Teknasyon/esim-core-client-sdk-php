<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Order;

use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class BalanceDetailDto
{
    use ToArray, ToJSON;
    private BalanceDetailTodayDto $today;

    /**
     * @var array<BalanceCountryDto>
     */
    private array $countries;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return BalanceDetailTodayDto
     */
    public function getToday(): BalanceDetailTodayDto
    {
        return $this->today;
    }

    /**
     * @param BalanceDetailTodayDto $today
     * @return BalanceDetailDto
     */
    public function setToday(BalanceDetailTodayDto $today): BalanceDetailDto
    {
        $this->today = $today;
        return $this;
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->countries;
    }

    /**
     * @param array $countries
     * @return BalanceDetailDto
     */
    public function setCountries(array $countries): BalanceDetailDto
    {
        $this->countries = $countries;
        return $this;
    }

}