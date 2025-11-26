<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .table-container {
            width: 95%;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            border-radius: 2px 2px 0 0;
            overflow: hidden; 
        }

        .table thead tr {
            background-color: #41b13dff; 
            color: #ffffff;
            text-align: left;
        }
        .table tbody tr {
            border-bottom:1px solid #dddddd;
        }
    </style>
</head>
<body>

    <div class="table-container">
        <h2>Bảng EXCEL</h2>

        <?php
        $file = 'dssv.csv';

        if (file_exists($file)) {
            echo '<table class="table">';
     
            if (($open_file = fopen($file, "r")) !== FALSE) {
                if (($header = fgetcsv($open_file, 1000, ",")) !== FALSE) {
                    echo '<thead><tr>';
                    foreach ($header as $col) {
                        echo '<th>' . htmlspecialchars($col) . '</th>';
                    }
                    echo "</tr></thead>";
            }
                echo "<tbody>";
                while (($data = fgetcsv($open_file, 1000, ",")) !== FALSE) {
                    echo '<tr>';
                    foreach ($data as $cell) {
                        echo '<td>' . htmlspecialchars($cell) . '</td>';
                    }
                    echo '</tr>';
                }
                echo "</tbody>";

                fclose($open_file);
            }
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>
