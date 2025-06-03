<?php include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM Sach WHERE MaSach='$id'");
header("Location: index.php");
