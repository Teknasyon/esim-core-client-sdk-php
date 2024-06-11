<?php

namespace eSIM\eSIMCoreClient\Dto\Response\Order;

use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class BalanceCountryDto
{
    use ToArray;
    use ToJSON;

    private string $code;
    private int $year;
    private int $month;
    private ?string $day;
    private int $data;
    private float $price;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return BalanceCountryDto
     */
    public function setCode(string $code): BalanceCountryDto
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return BalanceCountryDto
     */
    public function setYear(int $year): BalanceCountryDto
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $month
     * @return BalanceCountryDto
     */
    public function setMonth(int $month): BalanceCountryDto
    {
        $this->month = $month;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDay(): ?string
    {
        return $this->day;
    }

    /**
     * @param string|null $day
     * @return BalanceCountryDto
     */
    public function setDay(?string $day): BalanceCountryDto
    {
        $this->day = $day;
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
     * @return BalanceCountryDto
     */
    public function setData(int $data): BalanceCountryDto
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return BalanceCountryDto
     */
    public function setPrice(float $price): BalanceCountryDto
    {
        $this->price = $price;
        return $this;
    }
}