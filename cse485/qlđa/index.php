<?php
// Bước 1: Gọi file data.php chứa mảng dữ liệu (giả lập CSDL)
require 'data.php';
include "connect.php";
// Bước 2: Nhận thông báo thành công tạo mới qua phương thức GET (nếu có)
$success = $_GET['success'] ?? "";

$sql = "SELECT * FROM do_an";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
$new_do_an_list = array_merge($do_an_list, $rows);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Đồ án</title>
    <!-- Chèn CSS nếu cần, ví dụ Bootstrap hay style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="navbar">
    <div>Quản lý Đồ án Tốt nghiệp</div>
    <div>
        <a href="index.php">Dashboard</a>
        <a href="create.php" class="btn btn-primary">+ Thêm đồ án</a>
    </div>
</div>

<div class="container">
    <h1>Dashboard</h1>
    <p>Dữ liệu trong ví dụ này đang được lưu cố định trong một mảng PHP (chưa dùng CSDL).</p>

    <!-- Bước 3: Hiển thị thông báo nếu có tham số ?success=created -->
    <?php if ($success == "created"): ?>
        <div style="padding: 10px; background:#d1e7dd; color:#0f5132; border-radius:4px; margin-bottom:16px;">
            Thêm đồ án thành công !!!
        </div>
    <?php endif; ?>

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên đề tài</th>
            <th>Sinh viên</th>
            <th>GV hướng dẫn</th>
            <th>Năm học</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
        </tr>
        </thead>

       <?php if (!empty($new_do_an_list)): ?>
            <?php foreach ($new_do_an_list as $row):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    
                    <td><?php echo $row['ten_de_tai']?></td>
                    <td><?php echo $row['ten_sinh_vien'] ." (" .$row['mssv'].")";?></td>
                    <td><?php echo $row['giang_vien_hd']?></td>
                    <td><?php echo $row['nam_hoc']?></td>
                    <td><?php echo $row['trang_thai']?></td>
                    <td><?php echo $row['created_at']?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?> 
            <!-- Trường hợp mảng rỗng -->
            <tr>
                <td colspan="7">Chưa có đồ án nào trong mảng.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
