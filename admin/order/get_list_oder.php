<?php

require_once "../../connect.php";
$status = $_GET['status'];
$sql = "SELECT * FROM orders INNER JOIN orders_detail ON orders.id = orders_detail.order_id 
INNER JOIN laptops ON laptops.id = orders_detail.laptop_id where orders.status = $status";
$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
	// code...
}

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Get list orders successfull!',
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
