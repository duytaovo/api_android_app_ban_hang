<?php

require_once "../connect.php";

$shipper_id = $_POST['shipper_id'];
$order_id = $_POST['order_id'];


$sql_id_brand = "SELECT user_id FROM orders WHERE id = $order_id";
$data  = mysqli_query($connect, $sql_id_brand);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
  $result[] = ($row);
};
$user_id = $result[0]["user_id"];

$sql = "INSERT INTO transports(user_id, order_id) 
VALUES(
  $shipper_id,$order_id)";
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
