<?php
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ma = $_POST['MaSV'];
    $ten = $_POST['HoTen'];
    $gt = $_POST['GioiTinh'];
    $ns = $_POST['NgaySinh'];
    $khoa = $_POST['MaKhoa'];

    $sql = "INSERT INTO SinhVien VALUES ('$ma','$ten','$gt','$ns','$khoa')";
    $conn->query($sql);
    header("Location: index.php");
}
?>
<form method="post">
    Mã SV: <input name="MaSV"><br>
    Họ tên: <input name="HoTen"><br>
    Giới tính: 
    <select name="GioiTinh">
        <option>Nam</option>
        <option>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="NgaySinh"><br>
    Mã khoa: <input name="MaKhoa"><br>
    <button type="submit">Thêm</button>
</form>
