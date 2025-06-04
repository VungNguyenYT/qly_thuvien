<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // 1. Lấy mã sách, số lượng
    $row = $conn->query("SELECT MaSach, SoLuong FROM ThongTinMuon WHERE ID = $id")->fetch_assoc();
    $maSach = $row['MaSach'];
    $soLuong = $row['SoLuong'];

    // 2. Cập nhật trạng thái đã trả
    $conn->query("UPDATE ThongTinMuon SET TrangThai = 'Đã trả' WHERE ID = $id");

    // 3. Cộng lại số lượng sách
    $conn->query("UPDATE Sach SET SoLuong = SoLuong + $soLuong WHERE MaSach = '$maSach'");
}

header("Location: borrow_book.php");
