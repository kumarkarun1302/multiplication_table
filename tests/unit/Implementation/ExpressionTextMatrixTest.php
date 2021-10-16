<?php

namespace Unit\Implementation;

use PHPUnit\Framework\TestCase;
use \App\Implementation\ExpressionTextMatrix;
use \App\Contract\MatrixTable;
use \App\Common\MatrixCell;

/**
 * Class ExpressionTextMatrixTest
 * @package Unit\Implementation
 * @covers ExpressionTextMatrix
 */
class ExpressionTextMatrixTest extends TestCase
{
    public function testGetMaxLengthCell(): void {
        // SETUP
        $matrixTableStub = $this->createMock(MatrixTable::class);
        $matrixTableStub->method('getBaseTo')
            ->willReturn(10);
        $matrixTableStub->method('getMultiTo')
            ->willReturn(100);

        // ACTION
        $result = (new ExpressionTextMatrix($matrixTableStub))->getMaxLengthCell();

        // EXPECT
        $this->assertEquals(15, $result);
    }

    public function testGetCellValue(): void {
        // SETUP
        $matrixCell = new MatrixCell(12, 6);
        $matrixTableStub = $this->createMock(MatrixTable::class);

        // ACTION
        $result = (new ExpressionTextMatrix($matrixTableStub))->getCellValue($matrixCell);

        // EXPECT
        $this->assertEquals("12 * 6 = 72", $result);
    }
}