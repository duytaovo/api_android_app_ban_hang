<?php

$id = $_GET['id'] ?? -1;

require_once "../connect.php";

$sql = "SELECT laptops.*
FROM laptops join brands on laptops.brand_id = brands.id
WHERE laptops.id = $id";

$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
};

// add field brand
$brand_id = $result[0]["brand_id"];

$sql2 = "SELECT * from brands WHERE id = $brand_id";
$data2  = mysqli_query($connect, $sql2);
$brand = array();
while ($row2 = mysqli_fetch_assoc($data2)) {
	$brand[] = ($row2);
}

$result[0]['brand'] = $brand[0];

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
