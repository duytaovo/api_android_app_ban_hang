<?php
require_once "../../connect.php";
$id = $_GET['id'];


$sql = "SELECT * FROM orders WHERE id = $id";
$data  = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
};

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Get  successfull!',
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
