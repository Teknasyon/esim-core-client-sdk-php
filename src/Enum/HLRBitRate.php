<?php

namespace eSIM\eSIMCoreClient\Enum;

enum HLRBitRate: string
{
    case KB_128 = 'KB_128';
    case KB_256 = 'KB_256';
    case KB_384 = 'KB_384';
    case KB_512 = 'KB_512';
    case KB_1024 = 'KB_1024';
    case KB_3072 = 'KB_3072';
    case KB_5120 = 'KB_5120';
    case KB_10240 = 'KB_10240';
    case KB_20480 = 'KB_20480';
    case UNLIMITED = 'UNLIMITED';
}