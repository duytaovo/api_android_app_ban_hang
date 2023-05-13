<?php

require_once "../../connect.php";

$name_brand = $_POST['name_brand'];
$id = $_POST['id'];
$name = $_POST['name'];
$screen = $_POST['screen'];
$cpu = $_POST['cpu'];
$card = $_POST['card'];
$ram= $_POST['ram']; 
$rom = $_POST['rom']; 
$pin = $_POST['pin']; 
$weight = $_POST['weight']; 
$os = $_POST['os']; 
$connector = $_POST['connector']; 
$price = $_POST['price']; 
$sale_price = $_POST['sale_price']; 
$special = $_POST['special']; 
$year_launch = $_POST['year_launch']; 
$image_url = $_POST['image_url']; 
$description = $_POST['description']; 

$sql_id_brand = "SELECT id FROM brands WHERE name = '$name_brand'";
$data  = mysqli_query($connect, $sql_id_brand);

$result = array();

while ($row = mysqli_fetch_assoc($data)) {
	$result[] = ($row);
};
$brand_id = $result[0]["id"];


$sql = "UPDATE laptops SET `brand_id` = $brand_id, `name` = '$name', `screen` = '$screen',`cpu` = '$cpu',
`card` = '$card',`ram` = '$ram',`rom` = '$rom',`pin` = '$pin',
`weight` = $weight,`os` = '$os',`connector` = '$connector',`price` = $price,
`sale_price` = $sale_price,`special` = '$special',`year_launch` = $year_launch,`image_url` = '$image_url',
`description` = '$description' WHERE `id` = $id";


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
