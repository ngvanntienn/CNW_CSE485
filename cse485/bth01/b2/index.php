<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body {
            font-family: 'Segoe UI',sans-serif;
            background: #f4f7f8;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .question {
            margin-bottom: 25px;
            padding: 15px 20px;
            background: #f9fafb;


            border-radius: 5px;
        }
        .question strong {
            display: block;
        }
        label {
            display: block;
            padding: 6px 10px;
            margin-bottom: 5px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius:5px;
            cursor: pointer;

        }
        label:hover {
            background: #f1f8ff;
            border-color: #2196f3;
        }
        
        button {
            display: block;
            width: 100px;
            padding: 12px;
            background: #2196f3;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin: 20px auto 0 auto;
        }
        button:hover {
            background: #1976d2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mẫu đề thi trắc nghiệm bộ môn lập trình</h1>
        <form action="submit.php" method="POST">
        <?php
            $ques = [];
            $lines = file('quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $content = '';
            $choice = [];
            $answer = '';

            foreach ($lines as $line) {
                $line = trim($line);
                if (strpos($line, 'ANSWER:') === 0) {
                    $answer = trim(str_replace(['ANSWER:', ' '], '', $line));
                    if (!empty($content) && !empty($choice)) {
                        $ques[] = [
                            'content' => $content,
                            'choice'  => $choice,
                            
                            'answer'  => $answer
                        ];
                    }
                    $content = '';
                    $choice = [];


                } elseif (preg_match('/^[A-D]\. /', $line)) {
                    $choice[] = $line;
                } else {
                    $content .= ($content ? ' ' : '') . $line;
                }
            }

            if (!empty($content) && !empty($choice)) {
                $ques[] = [
                    'content' => $content,
                    'choice'  => $choice,
                    'answer'  => $answer
                ];
            }

            foreach ($ques as $index => $q) {
                $name = 'q' . ($index + 1);
                $ismultichoice = strpos($q['answer'], ',') !== false;

                echo "<div class='question'>";
                echo "<strong>Câu " . ($index + 1) . ":</strong> ". $q['content'] . "<br>";
                foreach ($q['choice'] as $c) {
                    $value = substr($c, 0, 1);
                    if ($ismultichoice) {
                        echo "<label><input type='checkbox' name='{$name}[]' value='$value'> $c</label>";
                    } else {
                        echo "<label><input type='radio' name='$name' value='$value'> $c</label>";
                    }
                }


                echo "</div>";
            }
        ?>
        <button type="submit">Nộp bài</button>
        </form>
    </div>
</body>
</html>


