<?php


namespace App\Implementation;


use App\Common\MatrixCell;
use App\Contract\MatrixTable;
use App\Contract\MultiplicationView;

abstract class MatrixMultiplicationView implements MultiplicationView
{
    //@var MatrixTable
    protected $matrixTable;

    function __construct(MatrixTable $matrixTable) {
        $this->matrixTable = $matrixTable;
    }
    function print(int $baseFrom, int $baseTo): void {
        $this->matrixTable->setBaseFromTo($baseFrom, $baseTo);

        $matrixData = $this->matrixTable->getData();
        for ($rowIndex = 0; $rowIndex < sizeof($matrixData); $rowIndex++) {
            $row = $matrixData[$rowIndex];
            foreach ($row as $cell) {
                $this->printCell($cell);
            }
            echo "\n";
        }
    }

    abstract function printCell(MatrixCell $matrixCell): void;
}