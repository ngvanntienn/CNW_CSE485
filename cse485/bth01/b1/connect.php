<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'loaihoa';

    $conn = new mysqli( $server, $user, $password, $database );
    if($conn)
    {
        mysqli_query( $conn,"SET NAMES 'utf8'");
    }
    else
    {
        echo "Kết nối thất bại !!!";
    }
?>