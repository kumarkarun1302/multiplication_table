<?php


namespace App\Common;


class MatrixCell
{
    //@var int
    public $base;

    //@var int
    public $multi;

    function __construct(int $base, int $multi) {
        $this->base = $base;
        $this->multi = $multi;
    }
}