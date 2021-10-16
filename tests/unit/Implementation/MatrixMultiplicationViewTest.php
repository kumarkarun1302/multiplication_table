<?php

namespace Unit\Implementation;

use App\Common\MatrixCell;
use App\Contract\MatrixTable;
use App\Helper\Formatter;
use PHPUnit\Framework\TestCase;
use \App\Implementation\MatrixMultiplicationView;

/**
 * Class MatrixMultiplicationViewTest
 * @package Unit\Implementation
 * @covers MatrixMultiplicationView
 */
class MatrixMultiplicationViewTest extends TestCase
{
    public function testPrintCell(): void{
        // SETUP
        $matrixTableDummy = $this->createMock(MatrixTable::class);
        $matrixCell = $this->createMock(MatrixCell::class);

        $matrixMultiplicationView = $this->getMockBuilder(MatrixMultiplicationView::class)
            ->setConstructorArgs([$matrixTableDummy])
            ->onlyMethods(['callStatic'])
            ->getMockForAbstractClass();

        $matrixMultiplicationView
            ->expects($this->once())
            ->method('callStatic')
            ->with(Formatter::class, 'printFixedLength', $matrixMultiplicationView->getCellValue($matrixCell), $matrixMultiplicationView->getMaxLengthCell())
            ->willReturn('Test');

        // ACTION & EXPECT
        $this->expectOutputString("Test");
        $matrixMultiplicationView->printCell($matrixCell);
    }
}