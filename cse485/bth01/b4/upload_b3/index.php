<?php
    include_once '../FileManager.php';
    if (isset($_POST['upload']))
    {
        $db = new Database();
        $fileManager = new FileManager($db);
        if (!empty($_FILES['file_csv']['tmp_name'])) {
            $file = $_FILES['file_csv']['tmp_name'];
            if (($handle = fopen($file, 'r')) !== FALSE)
            {
                $row = 0;
                while ($data = fgetcsv($handle, 1000,','))
                {
                    $username = $data[0];
                    $password = $data[1];
                    $lastname  = $data[2];
                    $firstname = $data[3];
                    $city = $data[4];
                    $email = $data[5];
                    $course1 = $data[6];
                    $fileManager->filecsv($username, $password, $lastname, $firstname, $city, $email, $course1);
                }
            }
        }
        header('Location: index.php');
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
