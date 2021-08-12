<?php
namespace Calculator\Tests;

use PHPUnit\Framework\TestCase;
use Calculator\StringCalculator;

class StringCalculatorTest extends TestCase
{
		
	public function testSumOfNumbers()
	{
		$this->calculator = new StringCalculator();
		$result = $this->calculator->add('1,2,5');
        	$this->assertEquals(8, $result);
	}
	
	public function testNoEmptyString()
	{
		$this->calculator = new StringCalculator();
		
		$this->assertEquals(0,$this->calculator->add(''));
	}
	
	function testNewLineDelimiter()
	 {
		$this->calculator = new StringCalculator();

		$this->assertEquals(3, $this->calculator->add("1\n,2"));
	}
	
	function testCustomDelimiters()
    	{
		$this->calculator = new StringCalculator();

		$this->assertEquals(7, $this->calculator->add("//;\n1;4;2"));
    	}
	
	function testCustomDelimitersArtibraryLength()
    	{
		$this->calculator = new StringCalculator();

		$this->assertEquals(8, $this->calculator->add("//;;;\n1;;;3;;;4"));
    	}
	
	function testNumberGreaterThan1000Ignored()
    	{
		$this->calculator = new StringCalculator();

		$this->assertEquals(23, $this->calculator->add("1,22,1345,2000"));
    	}
	
	public function testNoNegativeNumbers()
	{
		$this->calculator = new StringCalculator();
		
		$this->expectException(\Exception::class);

       		$this->calculator->add('1,-10');
	}
}
