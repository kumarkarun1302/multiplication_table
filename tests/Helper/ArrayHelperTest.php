<?php


use PHPUnit\Framework\TestCase;
use \App\Helper\ArrayHelper;

/**
 * Class ArrayHelperTest
 * @covers ArrayHelper
 */
class ArrayHelperTest extends TestCase
{
    /**
     * @covers ArrayHelper::slideColumn2DimensionArray
     */
    public function testSlideColumn2DimensionArrayWhenLimitColumnLessThanArrayColumn(): void {
        $input = array(
            array(1, 2, 3, 4, 5),
            array(2, 4, 6, 8, 10)
        );
        $limitColumn = 2;
        $expectOutput = array(
            array(1, 2),
            array(2, 4),
            array(3, 4),
            array(6, 8),
            array(5),
            array(10)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideColumn2DimensionArray($input, $limitColumn)
        );
    }

    /**
     * @covers ArrayHelper::slideColumn2DimensionArray
     */
    public function testSlideColumn2DimensionArrayWhenLimitColumnEqualArrayColumn(): void {
        $input = array(
            array(1, 2, 3),
            array(4, 5, 6)
        );
        $limitColumn = 3;
        $expectOutput = array(
            array(1, 2, 3),
            array(4, 5, 6)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideColumn2DimensionArray($input, $limitColumn)
        );
    }

    /**
     * @covers ArrayHelper::slideColumn2DimensionArray
     */
    public function testSlideColumn2DimensionArrayWhenLimitColumnGreaterThanArrayColumn(): void {
        $input = array(
            array(1, 2, 3),
            array(4, 5, 6)
        );
        $limitColumn = 5;
        $expectOutput = array(
            array(1, 2, 3),
            array(4, 5, 6)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideColumn2DimensionArray($input, $limitColumn)
        );
    }

    /**
     * @covers ArrayHelper::slideRow2DimensionArray
     */
    public function testSlideRow2DimensionArrayWhenLimitRowLessThanArrayRow(): void {
        $input = array(
            array(1, 2),
            array(2, 4),
            array(3, 6),
            array(4, 8),
            array(5, 10),
        );
        $limitRow = 2;
        $expectOutput = array(
            array(1, 2, 3, 6, 5, 10),
            array(2, 4, 4, 8)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideRow2DimensionArray($input, $limitRow)
        );
    }

    /**
     * @covers ArrayHelper::slideRow2DimensionArray
     */
    public function testSlideRow2DimensionArrayWhenLimitRowEqualArrayRow(): void {
        $input = array(
            array(1, 2),
            array(2, 4),
        );
        $limitRow = 2;
        $expectOutput = array(
            array(1, 2),
            array(2, 4)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideRow2DimensionArray($input, $limitRow)
        );
    }

    /**
     * @covers ArrayHelper::slideRow2DimensionArray
     */
    public function testSlideRow2DimensionArrayWhenLimitRowGreaterThanArrayRow(): void {
        $input = array(
            array(1, 2),
            array(2, 4),
        );
        $limitRow = 4;
        $expectOutput = array(
            array(1, 2),
            array(2, 4)
        );

        $this->assertEquals(
            $expectOutput,
            ArrayHelper::slideRow2DimensionArray($input, $limitRow)
        );
    }
}