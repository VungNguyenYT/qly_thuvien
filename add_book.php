<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma = $_POST['ma'];
    $ten = $_POST['ten'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $soluong = $_POST['soluong'];

    $sql = "INSERT INTO Sach (MaSach, TenSach, TacGia, NXB, SoLuong)
            VALUES ('$ma', '$ten', '$tacgia', '$nxb', $soluong)";
    if ($conn->query($sql)) {
        echo "<p>✅ Thêm thành công! <a href='index.php'>Về trang chủ</a></p>";
    } else {
        echo "<p style='color:red;'>❌ Lỗi: {$conn->error}</p>";
    }
}
?>

<h3>Thêm sách</h3>
<form method="post">
    <label>Mã sách:</label><br>
    <input name="ma" required><br>
    <label>Tên sách:</label><br>
    <input name="ten" required><br>
    <label>Tác giả:</label><br>
    <input name="tacgia"><br>
    <label>NXB:</label><br>
    <input name="nxb"><br>
    <label>Số lượng:</label><br>
    <input name="soluong" type="number" min="1" required><br><br>
    <button type="submit">Thêm sách</button>
</form>
</body>

</html>