<?php

require_once "../connect.php";

$order_id = $_POST['order_id'];


$sql_update_status = "UPDATE `orders` SET `status`= 2 WHERE  `id`=$order_id";
$data  = mysqli_query($connect, $sql_update_status);

$sql_update_status_trans = "UPDATE `transports` SET `status`= 1 WHERE `order_id`=$order_id";
 mysqli_query($connect, $sql_update_status_trans);
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
