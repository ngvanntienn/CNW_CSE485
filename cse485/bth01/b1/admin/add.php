<?php
include "../connect.php";
require '../data.php';
if (isset($_POST['name']) && isset($_POST['description']) && isset($_FILES['image'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $sql = "INSERT INTO loai_hoa (name, description, image) VALUES ('$name', '$description', '$image')";
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($image_tmp, "../images/".$image);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoa</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial;
            background: #eef1f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            width: 600px;
            background: white;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
        }
        h2 { text-align: center; margin: 0 0 20px 0; color: #333; }
        .form-group { margin-bottom: 20px; width: 100%; }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbbbbbd3;
            border-radius: 6px;
            font-size: 15px;
        }
        .add-continue {
            display: inline-block;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            color: white;
            background: #1815a7ff;
            cursor: pointer;
            font-size: 17px;
            text-decoration: none;
            margin: 0 auto;
        }
        .add-continue:hover { background: #2424bbff; }
        .back-admin {
            text-align: center;
            display: block;
            margin-top: 18px;
            color: #0b08b8;
            text-decoration: none;
            font-size: 15px;
        }
        .back-admin:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Flowers</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Description: </label>
                <textarea name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label>Đường dẫn hình ảnh: </label>
                <input type="file" name="image" required>
            </div>
            <div class="form-group" style="text-align:center;">
                <button type="submit" class="add-continue">Ấn để thêm</button>
            </div>
        </form>
        <a class="back-admin" href="../index.php?page=admin">Quay lại trang admin</a>
    </div>
</body>
</html>
