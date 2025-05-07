<?php
include 'connect.php';

if (isset($_GET['MaSV'])) {
    $masv = $_GET['MaSV'];
    $conn->query("DELETE FROM SinhVien WHERE MaSV = '$masv'");
}

header("Location: index.php");
?>
