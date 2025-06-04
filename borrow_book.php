<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
include 'includes/header.php';

// Xử lý khi mượn sách
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maHS = $_POST['mahs'];
    $maSach = $_POST['masach'];
    $soLuong = $_POST['soluong'];
    $ngay = date('Y-m-d');

    // Lấy tên học sinh và tên sách
    $tenHS = $conn->query("SELECT TenHS FROM HocSinh WHERE MaHS = '$maHS'")->fetch_assoc()['TenHS'];
    $tenSach = $conn->query("SELECT TenSach FROM Sach WHERE MaSach = '$maSach'")->fetch_assoc()['TenSach'];

    // Lưu thông tin mượn vào bảng ThongTinMuon
    $stmt = $conn->prepare("INSERT INTO ThongTinMuon (MaHS, TenHS, MaSach, TenSach, SoLuong, NgayMuon)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $maHS, $tenHS, $maSach, $tenSach, $soLuong, $ngay);
    $stmt->execute();

    // Trừ số lượng sách
    $conn->query("UPDATE Sach SET SoLuong = SoLuong - $soLuong WHERE MaSach = '$maSach'");

    echo "<p style='color:green;'>✅ Đã lưu thông tin mượn vào bảng ThongTinMuon!</p>";
}


?>

<h3>📥 Mượn sách</h3>
<form method="post">
    <label>Mã học sinh:</label><br>
    <select name="mahs" required>
        <?php
        $hs = $conn->query("SELECT * FROM HocSinh");
        while ($r = $hs->fetch_assoc()) {
            echo "<option value='{$r['MaHS']}'>{$r['TenHS']} ({$r['MaHS']})</option>";
        }
        ?>
    </select><br><br>

    <label>Chọn sách:</label><br>
    <select name="masach" required>
        <?php
        $sach = $conn->query("SELECT * FROM Sach WHERE SoLuong > 0");
        while ($r = $sach->fetch_assoc()) {
            echo "<option value='{$r['MaSach']}'>{$r['TenSach']} ({$r['SoLuong']} còn lại)</option>";
        }
        ?>
    </select><br><br>

    <label>Số lượng mượn:</label><br>
    <input type="number" name="soluong" min="1" required><br><br>

    <button type="submit">📚 Mượn sách</button>


</form>

<hr>

<h3>📋 Danh sách sách đã mượn</h3>
<table>
    <tr>
        <th>Học sinh</th>
        <th>Tên sách</th>
        <th>Số lượng</th>
        <th>Ngày mượn</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM ThongTinMuon ORDER BY NgayMuon DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['TenHS']}</td>
                <td>{$row['TenSach']}</td>
                <td>{$row['SoLuong']}</td>
                <td>{$row['NgayMuon']}</td>
              </tr>";
    }
    ?>
</table>


</div>
</body>

</html>