<?php


namespace App\Implementation;


use App\Common\MatrixCell;
use App\Contract\MatrixTable;
use App\Helper\ArrayHelper;

class BaseMatrixTable implements MatrixTable
{
    const DIRECTION_ROW2COLUMN = 'r2c';
    const DIRECTION_COLUMN2ROW = 'c2r';
    //@var string
    private $direction;

    //@var int
    private $baseFrom;

    //@var int
    private $baseTo;

    //@var int
    private $multiFrom;

    //@var int
    private $multiTo;

    //@var int
    private $limitColumn;

    //@var int
    private $limitRow;

    //@var array
    private $matrixData;

    //@var int
    private $rowNum;


    /**
     * BaseMatrixTable constructor.
     * @param string $direction
     * @param int $multiFrom
     * @param int $multiTo
     * @param int $limitColumn
     * @param int $limitRow
     * @throws \Exception
     */
    function __construct(string $direction, int $multiFrom, ?int $multiTo, ?int $limitColumn, ?int $limitRow)
    {
        if ($direction !== self::DIRECTION_COLUMN2ROW && $direction !== self::DIRECTION_ROW2COLUMN) {
            throw new \Exception("Not Valid Direction");
        }
        $this->direction = $direction;

        $this->multiFrom = $multiFrom;

        $this->multiTo = $multiTo;

        if ($limitColumn !== null && $limitRow !== null) {
            throw new \Exception("Can not set both limit column and limit row");
        }

        $this->limitColumn = $limitColumn;
        $this->limitRow = $limitRow;
        $this->matrixData = array();
    }

    function getData(): array
    {
        if (sizeof($this->matrixData) > 0) {
            return $this->matrixData;
        }

        $this->generateStandardData();
        $this->handleLimitColumn();
        $this->handleLimitRow();

        return $this->matrixData;
    }

    private function generateStandardData() {
        for ($base = $this->baseFrom; $base <= $this->baseTo; $base++) {
            for ($multi = $this->multiFrom; $multi <= $this->multiTo; $multi++) {
                if ($this->direction == self::DIRECTION_ROW2COLUMN) {
                    $currentRow = $base - $this->baseFrom;
                } else {
                    $currentRow = $multi - 1;
                }

                if (!isset($this->matrixData[$currentRow])) {
                    $this->rowNum++;
                    $this->matrixData[$currentRow] = array();
                }
                $this->matrixData[$currentRow][] = new MatrixCell($base, $multi);
            }
        }
    }

    private function handleLimitColumn() {
        if ($this->limitColumn !== null) {
            $this->matrixData = ArrayHelper::slideColumn2DimensionArray($this->matrixData, $this->limitColumn);
        }
    }

    private function handleLimitRow() {
        if ($this->limitRow !== null) {
            $this->matrixData = ArrayHelper::slideRow2DimensionArray($this->matrixData, $this->limitRow);
        }
    }

    function setBaseFromTo(int $baseFrom, int $baseTo): void {
        $this->baseFrom = $baseFrom;
        $this->baseTo = $baseTo;

        $this->updateMultiTo();
    }

    function getBaseTo(): int {
        return $this->baseTo;
    }

    function getMultiTo(): int {
        return $this->multiTo;
    }

    private function updateMultiTo(): void {
        if ($this->multiTo === null) {
            $this->multiTo = $this->baseTo;
        }
    }
}