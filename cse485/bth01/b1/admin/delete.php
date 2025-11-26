<?php
    include "../connect.php";
    require '../data.php';
    $this_id = $_GET['id'];
    $sql = "DELETE FROM loai_hoa WHERE id = $this_id";
    mysqli_query($conn, $sql);
    header("Location: ../index.php?page=admin");
?>