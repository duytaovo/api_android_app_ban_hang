<?php

require_once "../../connect.php";

$id = $_POST['id'];


$sql = "UPDATE laptops SET `status` = 1 WHERE `id` = $id";
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
