<?php

require_once "../../connect.php";

$id = $_POST['id'];


$sql = "DELETE FROM brands WHERE  id=$id";
$data = mysqli_query($connect, $sql);
if($data == true) {
  $arr = [
    "success" => true,
    "message" => "thanh cong roi + $id"
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
