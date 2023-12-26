<?php

namespace eSIM\eSIMCoreClient\Enum;

enum Headers: string
{
    case CONTENT_TYPE = 'Content-Type';
    case TOKEN = 'X-Token';
    case SIGNATURE = 'X-Req-Signature';
    case CLIENT_COUNTRY = 'X-Client-Country';
    case CLIENT_LANGUAGE = 'X-Client-Language';
    case CLIENT_IP = 'X-Client-Ip';
    case CORRELATION_ID = 'X-Correlation-Id';
    case CLIENT_TIMEZONE = 'X-Client-Timezone';
    case CURRENCY = 'X-Currency';
}