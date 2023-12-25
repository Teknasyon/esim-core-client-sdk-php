<?php

namespace eSIM\eSIMCoreClient\Exception;

use eSIM\eSIMCoreClient\Enum\Error;
use Exception;

class ClientException extends Exception
{
    const EXCEPTION_MESSAGE = '%s provider returned code %s';
    const HTTP_BAD_REQUEST = 400;

    public function __construct($message, $statusCode)
    {
        $message = sprintf(self::EXCEPTION_MESSAGE, $message, $statusCode);
        $code = Error::CLIENT_ERROR->value;

        parent::__construct($message, $code);
    }

    public function getHttpStatus(): int
    {
        return self::HTTP_BAD_REQUEST;
    }
}