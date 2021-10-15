<?php


namespace App\Contract;


interface MultiplicationView
{
    function print(int $baseFrom, int $baseTo): void;
}