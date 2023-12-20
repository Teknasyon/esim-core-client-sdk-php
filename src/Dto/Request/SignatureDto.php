<?php

namespace Esim\eSIMCoreClient\Dto\Request;

use App\Trait\ToArray;
use App\Trait\ToJSON;

class SignatureDto
{
    use ToArray, ToJSON;

    private string $url;
    private ?array $queryString;
    private array $headers;
    private ?array $payload;

    public static function builder(): static
    {
        return new static();
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): SignatureDto
    {
        $this->url = $url;
        return $this;
    }

    public function getQueryString(): ?array
    {
        return $this->queryString;
    }

    public function setQueryString(?array $queryString): SignatureDto
    {
        $this->queryString = $queryString;
        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): SignatureDto
    {
        $this->headers = $headers;
        return $this;
    }

    public function getPayload(): ?array
    {
        return $this->payload;
    }

    public function setPayload(?array $payload): SignatureDto
    {
        $this->payload = $payload;
        return $this;
    }

    public function toArrayIgnoreNullValues(): bool
    {
        return true;
    }
}