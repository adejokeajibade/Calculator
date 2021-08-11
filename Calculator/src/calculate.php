<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> String Calculator</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <div align="center">
		<nav>  
			<h1 style='color:blue;text-align:center'> String Calculator</h1>
				<div>Type Input Here</div>
				<?php
					if (isset($_GET['message'])) {  
						echo "<p style='color:red;text-align:center'>{$_GET['message']}</p>";
                    } 
					?>
         </nav>
        <form method="POST" action="main.php">
            <input name="numbers" required type="text" value="">
			<input type="submit" value = "Calculate">
		</form>
		<?php
			if (isset ($_SESSION['result'])) 
			{
				$result = $_SESSION['result'];
				echo "<h1>Result: $result</h1>"; 
				
			}
			session_destroy();
		?>
    </div>

</body>
</html>