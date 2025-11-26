<?php
include "../connect.php";
require '../data.php';
$id = isset($_GET['id']) ? $_GET['id'] : 1;
foreach ($flowers as $flower) {
    if ($flower['id'] == $id) {
        $row = $flower;
        break;
    }
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa hoa</title>
    <style>
        * {
            box-sizing: border-box;
        }
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
        h2 {
            text-align: center;
            margin: 0 0 20px 0;
        }
        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbbbbbd3;
            border-radius: 6px;
            font-size: 15px;
        }
        .edit-continue {
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            color: white;
            background: #1815a7ff;
            cursor: pointer;
            font-size: 17px;
        }
        .edit-continue:hover {
            background: #2424bbff;
        }
        .form-group.center {
            text-align: center;
        }
        .back-admin {
            text-align: center;
            display: block;
            margin-top: 18px;
            color: #0b08b8;
            text-decoration: none;
            font-size: 15px;
        }
        .back-admin:hover {
            text-decoration: underline;
        }
        .img-now img {
            display: block;
            margin: 10px auto 0 auto;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit: <?php echo ($row['name']); ?></h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" rows="4" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Chọn hình mới (nếu muốn đổi):</label>
                <input type="file" name="image">
                <div class="img-now">
                    <p style="text-align:center;">Ảnh hiện tại:</p>
                    <img src="../<?php echo $row['image']; ?>" height="100px">
                </div>
            </div>
            <div class="form-group center">
                <button type="submit" class="edit-continue">Ấn để sửa</button>
            </div>
        </form>
        <a class="back-admin" href="../index.php?page=admin">Quay lại trang admin</a>
</body>
</html>
