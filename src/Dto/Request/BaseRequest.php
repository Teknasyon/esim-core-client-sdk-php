<?php

declare(strict_types=1);

namespace eSIM\eSIMCoreClient\Dto\Request;

abstract class BaseRequest
{
    /**
     * @var string
     * @example TR
     */
    private string $country;

    /**
     * @var string
     * @example tr
     */
    private string $language;

    /**
     * @var string
     * @example 127.0.0.1
     */
    private string $ip;

    /**
     * @var string|null
     * @example  Any string value for tracking purposes.
     */
    private ?string $correlationId = null;

    /**
     * @var string|null
     * @example Europe/Istanbul
     */
    private ?string $timezone = null;

    /**
     * @var string|null
     * @example TRT
     */
    private ?string $currency = null;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return BaseRequest
     */
    public function setCountry(string $country): BaseRequest
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return BaseRequest
     */
    public function setLanguage(string $language): BaseRequest
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return BaseRequest
     */
    public function setIp(string $ip): BaseRequest
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCorrelationId(): ?string
    {
        return $this->correlationId;
    }

    /**
     * @param string|null $correlationId
     * @return BaseRequest
     */
    public function setCorrelationId(?string $correlationId): BaseRequest
    {
        $this->correlationId = $correlationId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param string|null $timezone
     * @return BaseRequest
     */
    public function setTimezone(?string $timezone): BaseRequest
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     * @return $this
     */
    public function setCurrency(?string $currency): BaseRequest
    {
        $this->currency = $currency;
        return $this;
    }
}