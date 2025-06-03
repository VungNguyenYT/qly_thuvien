<?php include 'db.php';
include 'includes/header.php'; ?>

<h3>Danh sách sách</h3>
<table>
    <tr>
        <th>Mã sách</th>
        <th>Tên sách</th>
        <th>Tác giả</th>
        <th>NXB</th>
        <th>Số lượng</th>
        <th>Hành động</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM Sach");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['MaSach']}</td>
                <td>{$row['TenSach']}</td>
                <td>{$row['TacGia']}</td>
                <td>{$row['NXB']}</td>
                <td>{$row['SoLuong']}</td>
                <td>
                    <a href='edit_book.php?id={$row['MaSach']}' class='button'>Sửa</a>
                    <a href='delete_book.php?id={$row['MaSach']}' class='button' onclick=\"return confirm('Xóa sách này?')\">Xóa</a>
                </td>
              </tr>";
    }
    ?>
</table>
</body>

</html>