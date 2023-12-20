<?php

namespace Esim\eSIMCoreClient\Trait;

use Esim\eSIMCoreClient\Helper\DateHelper;
use ReflectionClass;
use function Symfony\Component\String\u;

trait ToArray
{
    public function toArray($snakeCase = false): array
    {
        $reflect = new ReflectionClass($this);

        $allowProtectedLevel = false;
        if (method_exists($this, 'allowProtectedLevel')) {
            $allowProtectedLevel = $this->allowProtectedLevel();
        }
        if ($allowProtectedLevel) {
            $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE | \ReflectionProperty::IS_PROTECTED);
        } else {
            $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
        }

        $publicMethods = $reflect->getMethods(\ReflectionMethod::IS_PUBLIC);

        $response = [];
        $methods = [];
        $ignoreProperties = [];

        if (method_exists($this, 'toArrayIgnoreProperties')) {
            $ignoreProperties = $this->toArrayIgnoreProperties();
            $ignoreProperties[] = 'toArrayIgnoreProperties';
        }

        $ignoreNullValues = false;
        if (method_exists($this, 'toArrayIgnoreNullValues')) {
            $ignoreNullValues = $this->toArrayIgnoreNullValues();
        }

        foreach ($publicMethods as $method) {
            $methods[$method->name] = '';
        }

        foreach ($props as $prop) {
            $camelizePropName = u($prop->name)->camel()->title();
            if ($ignoreNullValues) {
                if (!isset($this->{$prop->name})) {
                    continue;
                }
            }
            if (!empty($ignoreProperties)) {
                if (in_array($prop->name, $ignoreProperties)) {
                    continue;
                }
            }
            if (isset($methods['is' . $camelizePropName])) {
                $getMethod = 'is' . $camelizePropName;
                $response[$prop->name] = boolval($this->{$getMethod}());
            }
            if (isset($methods['get' . $camelizePropName])) {
                if (is_object($this->{$prop->name})) {
                    if (method_exists($this->{$prop->name}, 'toArray')) {
                        $response[$prop->name] = $this->{$prop->name}->toArray();
                    } else {
                        if ($this->{$prop->name} instanceof \DateTime) {
                            $response[$prop->name] = $this->{$prop->name}->format(DateHelper::DATE_TIME_FORMAT);
                        } elseif ($this->{$prop->name} instanceof \UnitEnum) {
                            $response[$prop->name] = $this->{$prop->name}->value;
                        } else {
                            $response[$prop->name] = $this->{$prop->name}->__toString();
                        }
                    }
                } else {
                    if (is_array($this->{$prop->name}) &&
                        count($this->{$prop->name}) > 0 &&
                        is_object(current($this->{$prop->name}))
                    ) {
                        $response[$prop->name] = array_map(function ($item) {
                            if (is_object($item)) {
                                return $item->toArray();
                            }
                            return $item;
                        }, $this->{$prop->name});
                    } else {
                        $getMethod = 'get' . $camelizePropName;
                        $response[$prop->name] = $this->{$getMethod}();
                    }
                }
            }
        }
        if ($snakeCase) {
            return $this->convertKeysToSnakeCase($response);
        }
        return $response;
    }

    public function convertKeysToSnakeCase(array $data): array
    {
        $result = [];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $value = $this->convertKeysToSnakeCase($value);
            }
            $snakeKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            $result[$snakeKey] = $value;
        }

        return $result;
    }
}
