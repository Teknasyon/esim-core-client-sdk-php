<?php

namespace eSIM\eSIMCoreClient\Dto\Response\Order;

use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class BalanceDetailTodayDto
{
    use ToArray;
    use ToJSON;

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
     * @return int
     */
    public function getData(): int
    {
        return $this->data;
    }

    /**
     * @param int $data
     * @return BalanceDetailTodayDto
     */
    public function setData(int $data): BalanceDetailTodayDto
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
     * @return BalanceDetailTodayDto
     */
    public function setPrice(float $price): BalanceDetailTodayDto
    {
        $this->price = $price;
        return $this;
    }
}