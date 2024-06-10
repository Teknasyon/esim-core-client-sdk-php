<?php

namespace eSIM\eSIMCoreClient\Dto\Request;


class SubscriberBalanceRequest extends \eSIM\eSIMCoreClient\Dto\Request\BaseRequest
{

    private int $transactionId;
    private float $price;
    private float $totalBalance;
    private string $opaqueId;

    public static function build(): self
    {
        return new self();
    }

    public function getTransactionId(): int
    {
        return $this->transactionId;
    }

    public function setTransactionId(int $transactionId): SubscriberBalanceRequest
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): SubscriberBalanceRequest
    {
        $this->price = $price;
        return $this;
    }

    public function getTotalBalance(): float
    {
        return $this->totalBalance;
    }

    public function setTotalBalance(float $totalBalance): SubscriberBalanceRequest
    {
        $this->totalBalance = $totalBalance;
        return $this;
    }

    public function getOpaqueId(): string
    {
        return $this->opaqueId;
    }

    public function setOpaqueId(string $opaqueId): SubscriberBalanceRequest
    {
        $this->opaqueId = $opaqueId;
        return $this;
    }
}