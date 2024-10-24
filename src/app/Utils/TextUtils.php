<?php

namespace App\Utils;

class TextUtils
{
    public static function normalize(string $string): string
    {
        // Convert to lowercase
        $string = strtolower($string);
        // Convert to ASCII
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        // Remove non-ASCII characters
        $string = preg_replace('/[^a-z0-9.]/', '', $string);
        return $string;
    }
}
