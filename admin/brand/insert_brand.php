<?php

require_once "../../connect.php";

$name = $_POST['name'];
$address = $_POST['address'];
$image_url = $_POST['image_url'];

$sql = "INSERT INTO brands(name,address,image_url) 
VALUES(
  '$name','$address','$image_url')";
$data = mysqli_query($connect, $sql);

if($data == true) {
  $arr = [
    "success" => true,
    "message" => "Thành công rồi"
  ];
}
else{
  $arr = [
    "success" => false,
    "message" => "Không thành công"
  ];
}


print_r(json_encode($arr));

?>
