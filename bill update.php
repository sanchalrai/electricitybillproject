<!DOCTYPE html>
<head>
	<title>PHP - Electricity Bill Calculate</title>
</head>

<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of ' . $units . ' - ' . $result;
    }
}
function calculate_bill($units) {
    $first = 9;
    $second = 12;
    $third = 15;
    
    if($units <= 50) {
        $bill = $units * $first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $second);
    }
    else if($units > 100 ) {
        $temp = (50 * 9) + (50 * $second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $third);
    }
    
    return number_format((float)$bill, 2, '.', '');
}
?>
<body>
	<div id="page-wrap">
		<h1>Php - Electricity Bill Calculate</h1>
		
		<form action="" method="post" id="quiz-form">            
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />            
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>
		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>	
	</div>
</body>
</html>