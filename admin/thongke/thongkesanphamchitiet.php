<?php

require_once "../../connect.php";
$sql = "SELECT orders_detail.laptop_id,laptops.name,Sum(orders_detail.quantity) AS tong FROM orders_detail INNER JOIN laptops ON laptops.id = orders_detail.laptop_id GROUP BY orders_detail.laptop_id";
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
