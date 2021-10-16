<?php

namespace App\Implementation;

use App\Common\MatrixCell;
use App\Helper\Formatter;

class ResultTextMatrix extends MatrixMultiplicationView
{
    function getMaxLengthCell(): int {
        return num_len($this->matrixTable->getBaseTo() * $this->matrixTable->getMultiTo() );
    }

    function getCellValue(MatrixCell $matrixCell): string
    {
        return (string) $matrixCell->base * $matrixCell->multi;
    }
}