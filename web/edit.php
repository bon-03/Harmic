<?php
include 'connect.php';

// Kiểm tra nếu có mã SV truyền vào
if (isset($_GET['MaSV'])) {
    $masv = $_GET['MaSV'];

    // Lấy thông tin sinh viên
    $result = $conn->query("SELECT * FROM SinhVien WHERE MaSV = '$masv'");

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy sinh viên!";
        exit;
    }
} else {
    echo "Thiếu mã sinh viên!";
    exit;
}

// Cập nhật khi người dùng nhấn nút
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hoten = $_POST['HoTen'];
    $gioitinh = $_POST['GioiTinh'];
    $ngaysinh = $_POST['NgaySinh'];
    $makhoa = $_POST['MaKhoa'];

    $conn->query("UPDATE SinhVien SET HoTen='$hoten', GioiTinh='$gioitinh', NgaySinh='$ngaysinh', MaKhoa='$makhoa' WHERE MaSV='$masv'");
    header("Location: index.php");
}
?>

<h2>Sửa thông tin sinh viên</h2>
<form method="post">
    Mã SV: <input name="MaSV" value="<?= $row['MaSV'] ?>" readonly><br>
    Họ tên: <input name="HoTen" value="<?= $row['HoTen'] ?>"><br>
    Giới tính:
    <select name="GioiTinh">
        <option value="Nam" <?= $row['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $row['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select><br>
    Ngày sinh: <input type="date" name="NgaySinh" value="<?= $row['NgaySinh'] ?>"><br>
    Mã khoa: <input name="MaKhoa" value="<?= $row['MaKhoa'] ?>"><br>
    <button type="submit">Cập nhật</button>
</form>
