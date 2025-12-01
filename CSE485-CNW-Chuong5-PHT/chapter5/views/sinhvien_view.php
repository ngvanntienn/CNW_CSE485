<?php
// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach)
// Tệp View KHÔNG chứa câu lệnh SQL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHT Chương 5 - MVC</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th
        {
            background-color: #f2f2f2;
        }
        label {
            font-size: 18px;
            display: inline-block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h2>Thêm sinh viên mới (Kiến trúc MVC)</h2>
    <form action = "index.php" method = "POST" enctype = "multipart/form-data">
        <label>Tên sinh viên:</label> 
        <input type="text" name="ten_sinh_vien" required> 
        <br>
        <label>Email:</label> 
        <input type="email" name="email" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <h2>Danh sách sinh viên (Kiến trúc MVC)</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Tên sinh viên</th>
            <th>Email</th>
            <th>Ngày tạo</th>
        </tr>
        <?php
        // TODO 4: Dùng vòng lặp foreach để duyệt qua biến $danh_sach_sv
        // (Biến $danh_sach_sv này sẽ được Controller truyền sang)
        // Gợi ý: foreach ($danh_sach_sv as $sv) { ... }
        foreach ($danh_sach_sv as $sv):?>
            <tr>
                <td><?= htmlspecialchars($sv['id']) ?></td>
                <td><?= htmlspecialchars($sv['ten_sinh_vien']) ?></td>
                <td><?= htmlspecialchars($sv['email']) ?></td>
                <td><?= htmlspecialchars($sv['ngay_tao']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
