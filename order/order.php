<?php

require_once "../connect.php";

$user_id = $_POST["user_id"];
$name_receive = $_POST["name_receive"];
$address_receive = $_POST["address_receive"];
$phone_receive = $_POST["phone_receive"];
$message = $_POST["message"] ?? '';
$total_price = $_POST["total_price"];


$sql = "INSERT INTO orders(user_id, name_receive, address_receive, phone_receive, message, total_price)
VALUES($user_id, '$name_receive', '$address_receive', '$phone_receive', '$message', $total_price)";
$result  = mysqli_query($connect, $sql);

$arr = array();

if ($result) {
	$arr = [
		'success' => true,
		'message' => 'Order successfull!',
		'result'  => $result,	
    ];
	
} else {
	$arr = [
		'success' => false,
		'message' => 'Has error, please check your infomation!',
    ];
}

print_r(json_encode($arr));

?> 
