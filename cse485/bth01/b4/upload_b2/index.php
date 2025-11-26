<?php
include "../connect.php";

if(isset($_POST['upload_txt'])){
    $file = $_FILES['txt_file']['tmp_name'];
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    foreach($lines as $line){
        $parts = explode('|', $line); 
        if(count($parts) == 6){
            $sql = "INSERT INTO questions (question, choice, choice_b, choice_c, choice_d, answer)
                    VALUES ('$parts[1]', '$parts[2]', '$parts[3]', '$parts[4]', '$parts[5]', '$parts[6]')";
            mysqli_query($conn, $sql);
        }
    }
    header("Location: index.php?success=created");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Quiz</title>
</head>
<body>
<h2>Upload quiz</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file_txt" accept=".txt" required>
    <br><br>
    <button type="submit" name="upload">Upload</button>
</form>
</body>
</html>
