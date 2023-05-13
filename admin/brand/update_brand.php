<?php

require_once "../../connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$address = $_POST['address'];
$image_url = $_POST['image_url'];

$sql = "UPDATE brands SET `name` = '$name', `address` = '$address', `image_url` = '$image_url' WHERE `id` = $id";

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
