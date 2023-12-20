<?php

namespace Esim\eSIMCoreClient\Exception;

use Esim\eSIMCoreClient\Enum\Error;
use Exception;

class ResourceNotFoundException extends Exception
{
    const EXCEPTION_MESSAGE = 'Resource not found.';
    const HTTP_NOT_FOUND = 404;

    public function __construct()
    {
        $message = self::EXCEPTION_MESSAGE;
        $code = Error::RESOURCE_NOT_FOUND_ERROR->value;

        parent::__construct($message, $code);
    }

    public function getHttpStatus(): int
    {
        return self::HTTP_NOT_FOUND;
    }
}