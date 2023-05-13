<?php

$type = $_GET['type'] ?? '';

require_once "../connect.php";

if ($type == '') {
	$sql = "SELECT * FROM laptops";
}

if ($type == 'gaming') {
	$sql = "SELECT * FROM laptops WHERE name like '%Gaming%' limit 4";
}

if ($type == 'macbook') {
	$sql = "SELECT * FROM laptops WHERE name like '%Macbook%' limit 4";
}

if ($type == 'study') {
	$sql = "SELECT * FROM laptops WHERE sale_price <= 15999999  limit 4";
}

if ($type == 'technology') {
	$sql = "SELECT * FROM laptops WHERE sale_price > 20000000  limit 4";
}

if ($type == 'thin') {
	$sql = "SELECT * FROM laptops WHERE weight < 1.3  limit 4";
}

if ($type == 'diamond') {
	$sql = "SELECT * FROM laptops WHERE sale_price > 40000000  limit 4";
}

$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
	// code...
}

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Get list gaming product successfull!',
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
