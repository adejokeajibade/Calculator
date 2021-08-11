<?php

require_once __DIR__.'/../vendor/autoload.php';

use Calculator\StringCalculator;

  $numbers = $_POST['numbers'];
  $calculate_string = new StringCalculator();
  $result =  $calculate_string->add($numbers);
  
    //Pass values into session
	 session_start();
	$_SESSION['result'] = $result;
	
	header('Location: calculate.php');
	exit(); 
  



?>
