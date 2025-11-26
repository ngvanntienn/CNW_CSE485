<?php
include "../connect.php";
if(isset($_POST['upload'])){
    $file = $_FILES['file_csv']['tmp_name'];
    if(($handle = fopen($file, "r")) !== FALSE)
    {
        $row = 0;
        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
            if($row == 0)
            { 
                $row++; 
                continue; 
            } 

            $sql = "INSERT INTO excelcsv (username, password, lastname, firstname, city, email, course1) VALUES 
            ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')";
            mysqli_query($conn, $sql);
        }   
        fclose($handle);
        
    }
    header("Location: index.php?success=created");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <style>
        button {
            margin-top: 23px;

        }
    </style>
</head>
<body>
    <h2>Upload csv</h2>
    <form action = "" method = "POST" enctype="multipart/form-data">
        <input type = "file" name = "file_csv" accept = ".csv" required>
        <br>
        <button type="submit" name="upload">Upload</button>
    </form>
</body>
</html>