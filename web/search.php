<?php
include 'connect.php';
$keyword = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM SinhVien WHERE MaSV LIKE '%$keyword%' OR HoTen LIKE '%$keyword%'";
    $result = $conn->query($sql);
}
?>

<h2>Tìm kiếm sinh viên</h2>
<form method="post">
    Từ khóa: <input type="text" name="keyword" value="<?= $keyword ?>">
    <button type="submit">Tìm</button>
</form>

<?php if (!empty($keyword)) { ?>
    <h3>Kết quả tìm kiếm cho: <i><?= $keyword ?></i></h3>
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
<?php } ?>
