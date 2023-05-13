<?php

require_once "../../connect.php";
$sql = "SELECT * FROM users";
$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
	// code...
}

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Get list brands successfull!',
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
