<?php

require_once "../../connect.php";

// $year = $_GET['year'];
// $month = $_GET['month'];

// $sql = "SELECT SUM(total_price) AS doanhThu
// FROM orders
// WHERE DATE_FORMAT(created_at, '%Y-%m') = '$year-$month'";
// $data  = mysqli_query($connect, $sql);

$sql = "SELECT MONTH(created_at) AS month, SUM(total_price) AS doanhThu
FROM orders
WHERE YEAR(created_at) = YEAR(CURRENT_DATE()) and status = 3
GROUP BY MONTH(created_at)
ORDER BY MONTH(created_at)";
$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
	// code...
}

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Get successfull!',
		'result'  => $result,	
    ];
	
} else {
	$arr = [
		'success' => false,
		'message' => 'Has error, please check your database!',
    ];
}

print_r(json_encode($arr));

?> 
