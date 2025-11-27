<?php
    require_once '../FileManager.php';
    if (isset($_POST['upload']))
    {
        $db = new Database();
        $fileManager = new FileManager($db);

        if (!empty($_FILES['file_txt']['tmp_name']))
        {
            $file = $_FILES['file_txt']['tmp_name'];
            $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
            
            foreach ($lines as $line)
            {
                $rows = explode('|', $line);
                
                if (count($rows)==6)
                {
                    $question = $row[0];
                    $choice_a = $row[1];
                    $choice_b = $row[2];
                    $choice_c = $row[3];
                    $choice_d = $row[4];
                    $answer = $row[5];
                    $fileManager->filetxt($rows[0], $rows[1], $rows[2], $rows[3], $rows[4], $rows[5]);

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
