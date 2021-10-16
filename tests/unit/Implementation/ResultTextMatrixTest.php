<?php

namespace Unit\Implementation;

use App\Common\MatrixCell;
use App\Contract\MatrixTable;
use App\Implementation\ResultTextMatrix;
use PHPUnit\Framework\TestCase;

/**
 * Class ResultTextMatrixTest
 * @package Unit\Implementation
 * @covers ResultTextMatrix
 */
class ResultTextMatrixTest extends TestCase
{
    public function testGetMaxLengthCell(): void {
        // SETUP
        $matrixTableStub = $this->createMock(MatrixTable::class);
        $matrixTableStub->method('getBaseTo')
            ->willReturn(10);
        $matrixTableStub->method('getMultiTo')
            ->willReturn(100);

        // ACTION
        $result = (new ResultTextMatrix($matrixTableStub))->getMaxLengthCell();

        // EXPECT
        $this->assertEquals(4, $result);
    }

    public function testGetCellValue(): void {
        // SETUP
        $matrixCell = new MatrixCell(12, 6);
        $matrixTableDummy = $this->createMock(MatrixTable::class);

        // ACTION
        $result = (new ResultTextMatrix($matrixTableDummy))->getCellValue($matrixCell);

        // EXPECT
        $this->assertEquals("72", $result);
    }
}