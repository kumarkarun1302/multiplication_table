<?php


namespace App\Implementation;


use App\Common\MatrixCell;
use App\Helper\Formatter;

class ExpressionTextMatrix extends MatrixMultiplicationView
{
    function getMaxLengthCell(): int {
        return num_len($this->matrixTable->getBaseTo())
            + num_len($this->matrixTable->getMultiTo())
            + num_len($this->matrixTable->getBaseTo() * $this->matrixTable->getMultiTo())
            + 6;
    }

    function getCellValue(MatrixCell $matrixCell): string
    {
        $result = $matrixCell->base * $matrixCell->multi;
        return "{$matrixCell->base} * {$matrixCell->multi} = $result";
    }
}