<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include 'db.php';
include 'includes/header.php';

// Xử lý khi mượn sách
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maHS = $_POST['mahs'];
    $maSach = $_POST['masach'];
    $soLuong = $_POST['soluong'];
    $ngay = date('Y-m-d');

    // Lấy tên học sinh và sách
    $tenHS = $conn->query("SELECT TenHS FROM HocSinh WHERE MaHS = '$maHS'")->fetch_assoc()['TenHS'];
    $tenSach = $conn->query("SELECT TenSach FROM Sach WHERE MaSach = '$maSach'")->fetch_assoc()['TenSach'];

    // Lưu vào bảng ThongTinMuon
    $stmt = $conn->prepare("INSERT INTO ThongTinMuon (MaHS, TenHS, MaSach, TenSach, SoLuong, NgayMuon, TrangThai)
                            VALUES (?, ?, ?, ?, ?, ?, 'Chưa trả')");
    $stmt->bind_param("ssssis", $maHS, $tenHS, $maSach, $tenSach, $soLuong, $ngay);
    $stmt->execute();

    // Trừ số lượng sách
    $conn->query("UPDATE Sach SET SoLuong = SoLuong - $soLuong WHERE MaSach = '$maSach'");
}
?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <div class="notice">
        ✅ Đã lưu thông tin mượn sách thành công!
    </div>
<?php } ?>

<h3>📥 Mượn sách</h3>
<form method="post" class="borrow-form">
    <label for="mahs">👤 Chọn học sinh:</label>
    <select name="mahs" id="mahs" required>
        <option value="">-- Chọn học sinh --</option>
        <?php
        $hs = $conn->query("SELECT * FROM HocSinh");
        while ($r = $hs->fetch_assoc()) {
            echo "<option value='{$r['MaHS']}'>{$r['TenHS']} ({$r['MaHS']})</option>";
        }
        ?>
    </select>

    <label for="masach">📚 Chọn sách:</label>
    <select name="masach" id="masach" required>
        <option value="">-- Chọn sách --</option>
        <?php
        $sach = $conn->query("SELECT * FROM Sach WHERE SoLuong > 0");
        while ($r = $sach->fetch_assoc()) {
            echo "<option value='{$r['MaSach']}'>{$r['TenSach']} ({$r['SoLuong']} còn lại)</option>";
        }
        ?>
    </select>

    <label for="soluong">🔢 Số lượng mượn:</label>
    <input type="number" name="soluong" id="soluong" min="1" required>

    <button type="submit">✅ Mượn sách</button>
</form>

<h3>📋 Danh sách sách đã mượn</h3>
<table>
    <tr>
        <th>Học sinh</th>
        <th>Tên sách</th>
        <th>Số lượng</th>
        <th>Ngày mượn</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM ThongTinMuon ORDER BY NgayMuon DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['TenHS']}</td>
                <td>{$row['TenSach']}</td>
                <td>{$row['SoLuong']}</td>
                <td>{$row['NgayMuon']}</td>
                <td>{$row['TrangThai']}</td>
                <td>";
        if ($row['TrangThai'] === 'Chưa trả') {
            echo "<a href='return_book.php?id={$row['ID']}' class='button'>✅ Trả sách</a>";
        } else {
            echo "✔️";
        }
        echo "</td></tr>";
    }
    ?>
</table>

</div>
</body>

</html>