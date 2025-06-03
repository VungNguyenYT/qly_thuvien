<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // nếu bạn chưa đặt mật khẩu
$db = 'qly_thuvien';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>