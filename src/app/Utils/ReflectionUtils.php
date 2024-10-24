<?php

namespace App\Utils;

use ReflectionClass;
use ReflectionMethod;

class ReflectionUtils
{
    public static function getMethods($class)
    {
        $reflection = new ReflectionClass($class);
        return $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
    }

    public static function getMethodParameters($class, $method)
    {
        $reflection = new ReflectionClass($class);
        $method = $reflection->getMethod($method);
        $parameters = $method->getParameters();
        $parameterNames = [];
        foreach ($parameters as $parameter) {
            $parameterNames[] = $parameter->name;
        }
        return $parameterNames;
    }

    public static function getMethodParametersValues($class, $method, $data)
    {
        $parameters = self::getMethodParameters($class, $method);
        $parametersValues = [];
        foreach ($parameters as $parameter) {
            $parametersValues[$parameter] = $data[$parameter] ?? null;
        }
        return $parametersValues;
    }

    public static function invokeMethod($state_instance, $method, $data)
    {
        $reflection = new ReflectionClass($state_instance);
        $parametersValues = self::getMethodParametersValues($state_instance, $method, $data);
        return $reflection->getMethod($method)->invokeArgs($state_instance, $parametersValues);
    }
}
