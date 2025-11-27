<?php
    require_once "db.php";
    // === LOGIC THÊM SINH VIÊN (XỬ LÝ FORM POST) === 
    // TODO 2: Kiểm tra xem form đã được gửi đi (method POST) và có 'ten_sinh_vien' không 
    // Gợi ý: Dùng isset($_POST['...']) 
    if (isset($_POST['ten_sinh_vien']) && isset($_POST['email']))
    {
        // TODO 3: Lấy dữ liệu 'ten_sinh_vien' và 'email' từ $_POST
        $ten = $_POST['ten_sinh_vien'];
        $email = $_POST['email'];
        // TODO 4: Viết câu lệnh SQL INSERT với Prepared Statement (dùng dấu ?) 
        $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?,?)";

        // TODO 5: Chuẩn bị (prepare) và thực thi (execute) câu lệnh 
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$ten, $email]);

        // TODO 6: (Tùy chọn) Chuyển hướng về chính trang này để "làm mới"
        // Gợi ý: Dùng header('Location: chapter4.php'); 
        header('Location: chapter4.php');
        exit;
    }

    // === LOGIC LẤY DANH SÁCH SINH VIÊN (SELECT) ===
    // TODO 7: Viết câu lệnh SQL SELECT *
    $sql_select = "SELECT * FROM sinhvien ORDER BY ngay_tao ASC";
    // TODO 8: Thực thi câu lệnh SELECT (không cần prepare vì không có tham số)
    $stmt_select = $pdo->query($sql_select);
?>