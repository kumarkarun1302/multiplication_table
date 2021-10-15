<?php

namespace App\Contract;

interface MatrixTable
{
    function getData(): array;

    function setBaseFromTo(int $baseFrom, int $baseTo): void;

    function getBaseTo(): int;

    function getMultiTo(): int;
}