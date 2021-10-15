<?php
if (!function_exists('num_len')) {
    function num_len(int $number): int {
        return strlen((string)$number);
    }
}