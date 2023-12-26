<?php

namespace eSIM\eSIMCoreClient\Trait;

trait ToJSON
{

    public function toJSON(null|array|object $data = null): ?string
    {
        if (empty($data)) {
            if (method_exists($this, 'toArray')) {
                $data = $this->toArray();
            }
        }
        if (empty($data)) {
            return null;
        }
        return json_encode($data);
    }

}
