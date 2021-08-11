<?php

require_once __DIR__.'/../vendor/autoload.php';

use Calculator\StringCalculator;

 // $numbers = $_POST['numbers'];
   //print_r ($numbers);
  //$numbers = "//;;;\n1;;;3;;;4;;;2000";
  $numbers = "//@\n1@3@4";
  $calculate_string = new StringCalculator();
  $result =  $calculate_string->add($numbers);
  
  echo $numbers;
  echo $result
  
    //Pass values into session
	/* session_start();
	$_SESSION['result'] = $result;
	
	header('Location: calculate.php');
	exit(); */ 
  



?>