<?php

namespace App\Implementation;

use App\Common\MatrixCell;
use App\Helper\Formatter;

class ResultTextMatrix extends MatrixMultiplicationView
{
    function printCell(MatrixCell $matrixCell): void {
//        $maxLengthCell = num_len($this->matrixTable->getBaseTo()) * 2 + num_len($view->to * $view->to) + 6;
        $maxLengthCell = num_len($this->matrixTable->getBaseTo() * $this->matrixTable->getMultiTo() );
        $cellValue = $matrixCell->base * $matrixCell->multi;
        echo Formatter::printFixedLength($cellValue, $maxLengthCell);
    }
}