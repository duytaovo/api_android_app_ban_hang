<?php

require_once "../connect.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number']; 

$sql = "SELECT count(*) FROM users
WHERE email = '$email' or username='$username'";
$result = mysqli_query($connect, $sql);
$array_num_rows = mysqli_fetch_array($result);
$num_rows = $array_num_rows['count(*)'];

if ($num_rows == 0) {
    $sql = "INSERT INTO users(username, password, email, fullname, address, phone_number, image_url)
    values('$username', '$password', '$email', '$fullname', '$address', '$phone_number', 'https://i.pinimg.com/736x/e0/79/b3/e079b30176aff28399d42b97b5cd67e2.jpg')";
    mysqli_query($connect, $sql);

    $title = 'Đăng kí tài khoản thành công';
    $content = 'Chúc mừng bạn đã hoàn thành đăng kí <br>
    Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi <br>
    Chúng tôi xin phép gửi bạn mã giảm giá freeship cho đơn hàng đầu tiên với khách hàng mới <br>
    Kích vào link dưới đây để nhận mã giảm giá <br>
    <a href="https://www.youtube.com/watch?v=Q_JTr4UPRW8">Mã giảm giá</a>';

    require_once '../mail.php';
    send_mail($email, $fullname, $title, $content);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
    $data = mysqli_query($connect, $sql);
    
    $result = array();
    
    while ($row = mysqli_fetch_assoc($data)) {
        $result[] = ($row);
    }

    $arr = [
		'success' => true,
		'message' => 'Signup successfull!',
		'result'  => $result,	
    ];
    
} else {
    $arr = [
		'success' => false,
		'message' => 'Has error, Username or email has exits!',
    ];
}

print_r(json_encode($arr));

?>
