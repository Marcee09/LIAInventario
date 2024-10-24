<?php

namespace App\Utils;

class CaseConverters
{
    public static function toPascal(string $input): string
    {
        return str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $input)));
    }

    public static function toCamel(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $input))));
    }

    public static function toSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function toKebab(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

    public static function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    public static function camelToKebab(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

    public static function snakeToCamel(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
    }


    public static function kebabToCamel(string $input): string
    {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $input))));
    }

    public static function snakeToKebab(string $input): string
    {
        return str_replace('_', '-', $input);
    }

    public static function kebabToSnake(string $input): string
    {
        return str_replace('-', '_', $input);
    }

    public static function pascalToKebab(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

    public static function kebabToPascal(string $input): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $input)));
    }

    public static function snakeToPascal(string $input): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $input)));
    }
}
