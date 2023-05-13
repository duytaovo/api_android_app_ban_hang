<?php

require_once "../connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";

$data = mysqli_query($connect, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
	// code...
}

if (!empty($result)) {

	$arr = [
		'success' => true,
		'message' => 'Login successfull!',
		'result'  => $result,	
    ];
	
} else {
	$arr = [
		'success' => false,
		'message' => 'Has error, please check your username and password!',
    ];
}

print_r(json_encode($arr));

?>
