<?php
    require_once "add.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHT Chương 4 - Website hướng dữ liệu</title>
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
    <h2>Thêm Sinh Viên Mới (Chủ đề 4.3)</h2>
    <form action = "chapter4.php" method = "POST" enctype = "multipart/form-data">
        <label>Tên sinh viên:</label> 
        <input type="text" name="ten_sinh_vien" required> 
        <br>
        <label>Email:</label> 
        <input type="email" name="email" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <h2>Danh Sách Sinh Viên (Chủ đề 4.2)</h2> 
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>

        <?php
            // TODO 9: Dùng vòng lặp (ví dụ: while) để duyệt qua kết quả $stmt_select 
            // Gợi ý: while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) { ... } 
            while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC))
            {
                // TODO 10: In (echo) các dòng <tr> và <td> chứa dữ liệu $row
                // Gợi ý: echo "<tr>";
                // Gợi ý: echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                // (htmlspecialchars là để bảo mật, tránh lỗi XSS - sẽ học ở Chương 9)
                echo "<tr>";
                echo "<td>".htmlspecialchars($row['id'])."</td>";
                echo "<td>".htmlspecialchars($row['ten_sinh_vien'])."</td>";
                echo "<td>".htmlspecialchars($row['email'])."</td>";
                echo "<td>" . htmlspecialchars($row['ngay_tao']) . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>