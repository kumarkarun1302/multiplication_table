<?php

use \PHPUnit\Framework\TestCase;
use \App\Helper\Formatter;

/**
 * Class FormatterTest
 * @covers Formatter
 */
class FormatterTest extends TestCase
{
    public function testPrintFixedLengthWhenInputIsShort(): void {
        $this->assertEquals("  123", Formatter::printFixedLength("123", 3, 2));
    }

    public function testPrintFixedLengthWhenInputIsEqual(): void {
        $this->assertEquals("12345", Formatter::printFixedLength("12345", 3, 2));
    }

    public function testPrintFixedLengthWhenInputIsLong(): void {
        $this->assertEquals("1234567", Formatter::printFixedLength("1234567", 3, 2));
    }

    public function testPrintFixedLengthWhenNoMarginWasPassed(): void {
        $this->assertEquals("   123", Formatter::printFixedLength("123", 4));
    }

    public function testPrintFixedLengthWhenMarginWasPassed(): void {
        $this->assertEquals("    123", Formatter::printFixedLength("123", 4, 3));
    }
}