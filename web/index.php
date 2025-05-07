<?php
include 'connect.php'; // Phải đúng tên và đúng đường dẫn
$sql = "SELECT * FROM SinhVien";
$result = $conn->query($sql);
?>

<h2>Danh sách sinh viên</h2>
<a href="add.php">Thêm sinh viên</a>
<table border="1">
    <tr>
        <th>Mã SV</th><th>Họ tên</th><th>Giới tính</th><th>Ngày sinh</th><th>Mã khoa</th><th>Thao tác</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['MaSV'] ?></td>
        <td><?= $row['HoTen'] ?></td>
        <td><?= $row['GioiTinh'] ?></td>
        <td><?= $row['NgaySinh'] ?></td>
        <td><?= $row['MaKhoa'] ?></td>
        <td>
            <a href="edit.php?MaSV=<?= $row['MaSV'] ?>">Sửa</a> |
            <a href="delete.php?MaSV=<?= $row['MaSV'] ?>" onclick="return confirm('Xóa sinh viên?')">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
