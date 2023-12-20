<?php

declare(strict_types=1);

namespace Esim\eSIMCoreClient\Dto\Request;

class PackageGroupsRequest extends BaseRequest
{
    public static function builder(): static
    {
        return new static();
    }
}