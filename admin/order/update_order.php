<?php

require_once "../../connect.php";

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE `orders` SET `status`='$status' WHERE  `id`=$id";

$data = mysqli_query($connect, $sql);

if($data == true) {
  $arr = [
    "success" => true,
    "message" => "Thanh cong"
  ];
}
else{
  $arr = [
    "success" => false,
    "message" => "Khong thanh cong"
  ];
}


print_r(json_encode($arr));

?>
