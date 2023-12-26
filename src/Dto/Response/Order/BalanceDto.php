<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Response\Order;

use eSIM\eSIMCoreClient\Trait\ToArray;
use eSIM\eSIMCoreClient\Trait\ToJSON;

class BalanceDto
{
    use ToArray, ToJSON;
    private int $initial;
    private int $remaining;
    private int $spent;

    public static function builder(): static
    {
        return new static();
    }

    /**
     * @return int
     */
    public function getInitial(): int
    {
        return $this->initial;
    }

    /**
     * @param int $initial
     * @return BalanceDto
     */
    public function setInitial(int $initial): BalanceDto
    {
        $this->initial = $initial;
        return $this;
    }

    /**
     * @return int
     */
    public function getRemaining(): int
    {
        return $this->remaining;
    }

    /**
     * @param int $remaining
     * @return BalanceDto
     */
    public function setRemaining(int $remaining): BalanceDto
    {
        $this->remaining = $remaining;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpent(): int
    {
        return $this->spent;
    }

    /**
     * @param int $spent
     * @return BalanceDto
     */
    public function setSpent(int $spent): BalanceDto
    {
        $this->spent = $spent;
        return $this;
    }

    public function getPercentUsageBalance(): string
    {
        $percent = '0.00';
        if ($this->getSpent() > 0) {
            $percent = number_format(($this->getSpent() * 100) / $this->getInitial(), 2, '.', '');
        }
        return $percent;
    }
}