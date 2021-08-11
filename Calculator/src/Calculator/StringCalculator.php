<?php

namespace Calculator;
use Exception;

class StringCalculator
{
	
     /**
     * Add numbers.
     *
     * @param  string  $numbers
     * @return int
     *@throws Exceptions
     */
	public function add(string $numbers) 
	{
		
		try {
			$this->noNegativeNumbers($numbers_filtered = $this->inputString($numbers));
			
			$numbers_array_int = array_map('intval', $numbers_filtered);
			
			$sum_of_numbers = array_sum($this->numberGreaterThan1000Ignored($numbers_array_int));
			
			return $sum_of_numbers;
		}
		catch(Exception $e) {
			$message = 'Message: ' .$e->getMessage();
			header('Location: calculate.php?message='.$message);
			exit();
			
		}
		
		
	}
	
     /**
     * Input String.
     *
     * @param  string  $numbers
     * @return array
     */
	public function inputString (string $numbers)
	{
		$delimiter = ",";
		$new_line_identifier = "~";
		
		$customdelimiter = substr($numbers,0,2);

		//Handle custom Delimiters and multiple delimiters	
		if($customdelimiter == "//") 
		{
			
			//Identify New Line
			$numbers =  str_replace("\\n", $new_line_identifier, $numbers);
			$end_custom_delimiter = strpos($numbers, $new_line_identifier);
			$custom_delimiter_string_count = $end_custom_delimiter - 2;
			$multiple_delimiter = substr($numbers,2,$custom_delimiter_string_count);
			$numbers =  str_replace($multiple_delimiter,",",$numbers);
		}
	
		$numbers_filtered = preg_replace("/~|\n|\//", "", $numbers);
		
		return preg_split("/{$delimiter}/", $numbers_filtered);


	}
	
    /**
     * Check for negative numbers.
     *
     * @param  array  $numbers
     * @return array
     * @Throws Exceptions
     */
	public function noNegativeNumbers (array $numbers)
	{
		$delimiter = ",";
		$negatives = array_filter($numbers, function($x) {
			return $x < 0;
			});		
		if(!empty($negatives)) {
			throw new Exception("Negatives Not Allowed: ".implode($delimiter,$negatives));
			}
	
	}
	
	/**
     * Check for numbers greater than 1000.
     *
     * @param  array  $numbers
     * @return array
     */
	public function numberGreaterThan1000Ignored(array $numbers)
	{
		$numbers_array_range = array_filter($numbers, function($x){
				return $x <= 1000;
			});
			
			return $numbers_array_range;
	}
}

?>
