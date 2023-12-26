<?php

namespace eSIM\eSIMCoreClient\Helper;

use eSIM\eSIMCoreClient\Dto\Schema\Price;

class PriceHelper
{
    public static function createPriceSchema(float $price, string $currency, string $priceText, string $currencySymbol): Price
    {
        $priceSchema = Price::builder();

        $priceSchema->setPrice($price);
        $priceSchema->setCurrency($currency);
        $priceSchema->setPriceText($priceText);
        $priceSchema->setCurrencySymbol($currencySymbol);

        return $priceSchema;
    }
}