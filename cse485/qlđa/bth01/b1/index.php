<?php
include "connect.php";
require 'data.php';
$page = $_GET['page'] ?? 'guest';

$sql = "SELECT * FROM loai_hoa";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
$flowers = isset($flowers) && is_array($flowers) ? $flowers : [];
$new_flowers = array_merge($flowers, $row); 

?>
<!DOCTYPE html>
<html lang="vi">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .navbar {
            margin-bottom: 10px;
        }
        .navbar a {
            text-decoration: none;
            color: #5435c4ff;
            margin-right: 10px;
        }
        .navbar a.active {
            color: red;
            font-weight: bold;
        }

        .btn-add {
            background-color: #3335d4ff;
            color: white;
            padding: 6px 12px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0 0;
            display: inline-block;
            transition: transform 0.2s;
        }
        .btn-add:hover{
            transform: translateY(-5px);
        }

        .row {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            width: 100%;
        }
        .card {
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
            background: white;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 8px;
        }
        .card-title {
            font-size: 20px;
            margin: 0 0 10px 0;
            color: #dc3545;
        }
        .card-text {
            font-size: 14px;
            color: #555555e0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            table-layout: auto;
        }
        table, th, td {
            border: 1px solid #ddddddf1;
            border-collapse: collapse;
            
        }
        th, td {
            padding: 10px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }
        th {
            background-color: #007bff;
            color: white;
        }

        button a {
            text-decoration: none;
            color: white;
        }
        button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            display: inline-block;
            cursor: pointer;
            margin-right: 5px;
        }
        button:hover {
            transform: translateY(-5px);
        }
        button.edit {
            background-color: #198754;
            margin-bottom: 8px;


        }
        button.delete {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <strong>Các loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</strong>
        <div>

            <a href="index.php?page=guest" class="<?php echo ($page=='guest')?'active'  :''; ?>">Trang khách</a> |
            <a href="index.php?page=admin" class="<?php echo ($page=='admin')?'active':''; ?>">Trang quản trị (CRUD)</a>
            <br>
        </div>
    </div>

    <?php if ($page == 'guest'): ?>
        <div class="row">
            <?php foreach ($flowers as $row): ?>
                <div class="card">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    <?php else: ?>
        <div class="container">
            <a class="btn-add" href="admin/add.php">Add Flower</a>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên loại hoa</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($flowers)): ?>
                        <?php foreach ($flowers as $row): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><img width="80px" height="50px" src="<?php echo $row['image']; ?>" alt=""></td>
                                <td>
                                    <button class="edit"><a href="admin/edit.php?id=<?php echo $row['id']; ?>">Edit</a></button>
                                    <button class="delete"><a href="admin/delete.php?id=<?php echo $row['id']; ?>" 
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Delete</a></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Chưa có thông tin về các loại hoa</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>
</html>
