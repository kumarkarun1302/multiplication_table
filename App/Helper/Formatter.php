<?php


namespace App\Helper;


class Formatter
{
    public static function printFixedLength(string $input, int $length, int $margin = 2): string {
        return str_pad($input, $length + $margin, " ", STR_PAD_LEFT);
    }
}