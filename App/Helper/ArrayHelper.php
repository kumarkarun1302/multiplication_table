<?php

namespace App\Helper;

class ArrayHelper {
    static function slideColumn2DimensionArray(array $input, int $limitColumn): array {
        $tempOutput = array();
        $rowNum = sizeof($input);

        foreach ($input as $currentRowIndex => $row) {
            $rowSplitCount = 0;
            foreach ($row as $index => $cell) {
                if ($index == ($rowSplitCount + 1) * $limitColumn) {
                    $rowSplitCount++;
                }
                $rowIndex = $rowSplitCount * $rowNum + $currentRowIndex;
                if (!isset($tempOutput[$rowIndex])){
                    $tempOutput[$rowIndex] = array();
                }
                $tempOutput[$rowIndex][] = $cell;
            }
        }
        return $tempOutput;
    }

    static function slideRow2DimensionArray(array $input, int $limitRow): array {
        $tempOutput = array();

        foreach ($input as $currentRowIndex => $row) {
            foreach ($row as $index => $cell) {
                $rowIndex = $currentRowIndex % $limitRow;
                if (!isset($tempOutput[$rowIndex])){
                    $tempOutput[$rowIndex] = array();
                }
                $tempOutput[$rowIndex][] = $cell;
            }
        }
        return $tempOutput;
    }
}