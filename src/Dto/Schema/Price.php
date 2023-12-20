<?php

declare(strict_types=1);

namespace Esim\eSIMCoreClient\Dto\Schema;

class Price
{
    private float $price;
    private string $currency;
    private string $priceText;
    private string $currencySymbol;

    public static function builder(): static
    {
        return new static();
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
     * @return Price
     */
    public function setPrice(float $price): Price
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Price
     */
    public function setCurrency(string $currency): Price
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getPriceText(): string
    {
        return $this->priceText;
    }

    /**
     * @param string $priceText
     * @return Price
     */
    public function setPriceText(string $priceText): Price
    {
        $this->priceText = $priceText;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencySymbol(): string
    {
        return $this->currencySymbol;
    }

    /**
     * @param string $currencySymbol
     * @return Price
     */
    public function setCurrencySymbol(string $currencySymbol): Price
    {
        $this->currencySymbol = $currencySymbol;
        return $this;
    }
}