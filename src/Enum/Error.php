<?php

namespace Esim\eSIMCoreClient\Enum;

enum Error: int
{
    case CLIENT_ERROR = 400000;
    case RESOURCE_NOT_FOUND_ERROR = 404000;
}