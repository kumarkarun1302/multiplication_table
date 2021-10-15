<?php


namespace App\Implementation;


use App\Common\MatrixCell;
use App\Helper\Formatter;

class ExpressionTextMatrix extends MatrixMultiplicationView
{

    function printCell(MatrixCell $matrixCell): void
    {
        $maxLengthCell = num_len($this->matrixTable->getBaseTo()) + num_len($this->matrixTable->getMultiTo()) + num_len($this->matrixTable->getBaseTo() * $this->matrixTable->getMultiTo()) + 6;
        $result = $matrixCell->base * $matrixCell->multi;
        $cellValue = "{$matrixCell->base} * {$matrixCell->multi} = $result";
        echo Formatter::printFixedLength($cellValue, $maxLengthCell);
    }
}