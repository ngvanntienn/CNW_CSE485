<?php
    // Kết nối PDO
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cse485_web";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try 
    {
        // TODO 1: Tạo đối tượng PDO để kết nối CSDL
        // Gợi ý: $pdo = new PDO(...); 
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (\PDOException $e)
    {
        die("Kết nối thất bại !!".$e->getMessage());
    }
?>