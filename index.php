<?php include 'db.php';
include 'includes/header.php'; ?>

<h2>📖 Danh sách sách</h2>

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
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['MaSach']}</td>
                    <td>{$row['TenSach']}</td>
                    <td>{$row['TacGia']}</td>
                    <td>{$row['NXB']}</td>
                    <td>{$row['SoLuong']}</td>
                    <td>
                        <a href='edit_book.php?id={$row['MaSach']}' class='button edit'>✏️ Sửa</a>
                        <a href='delete_book.php?id={$row['MaSach']}' class='button delete'
                           onclick=\"return confirm('Xác nhận xoá sách này?')\">🗑️ Xóa</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>📭 Chưa có sách nào trong hệ thống.</td></tr>";
    }
    ?>
</table>

</div> <!-- .container -->
</body>

</html>