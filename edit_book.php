<?php include 'db.php';
include 'includes/header.php';

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM Sach WHERE MaSach='$id'")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['ten'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $soluong = $_POST['soluong'];

    $sql = "UPDATE Sach SET TenSach='$ten', TacGia='$tacgia', NXB='$nxb', SoLuong=$soluong WHERE MaSach='$id'";
    if ($conn->query($sql)) {
        echo "<p>Cập nhật thành công! <a href='index.php'>Về trang chủ</a></p>";
    } else {
        echo "<p>Lỗi: {$conn->error}</p>";
    }
}
?>

<h3>Sửa sách</h3>
<form method="post">
    Tên sách: <input name="ten" value="<?= $row['TenSach'] ?>"><br>
    Tác giả: <input name="tacgia" value="<?= $row['TacGia'] ?>"><br>
    NXB: <input name="nxb" value="<?= $row['NXB'] ?>"><br>
    Số lượng: <input name="soluong" type="number" value="<?= $row['SoLuong'] ?>"><br><br>
    <button type="submit">Cập nhật</button>
</form>
</body>

</html>