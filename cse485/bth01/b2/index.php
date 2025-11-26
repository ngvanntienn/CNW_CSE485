<?php
$lines = file("quiz.txt", FILE_IGNORE_NEW_LINES);
$questions = [];

foreach($lines as $line){
    $parts = explode('|', $line);
    $questions[] = [
        'question' => $parts[0],
        'answers' => array_slice($parts, 1, 4),

    ];
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bài trắc nghiệm</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f0f2f5;
    margin: 0;
    padding: 20px;
}
.container {
    max-width: 800px;
    margin: auto;
    background: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
h2 {
    text-align: center;
    color: #007bff;
}
.question {
    margin-bottom: 20px;
}
.answers label {
    display: block;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: 0.2s;
}
.answers label:hover {
    background: #f1f1f1;
}
button {
    background: #007bff;
    color: white;
    padding: 10px 25px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
</style>
</head>
<body>
<div class="container">
<h2>Bài trắc nghiệm</h2>
<form method="post" action="submit_quiz.php">
    <?php foreach($questions as $index => $q): ?>
        <div class="question">
            <p><strong><?php echo ($index+1).'. '.$q['question']; ?></strong></p>
            <div class="answers">
                <?php foreach($q['answers'] as $i => $a): ?>
                    <label>
                        <input type="radio" name="answer<?php echo $index; ?>" value="<?php echo $i+1; ?>"> <?php echo $a; ?>
                    </label>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <div style="text-align:center;">
        <button type="submit">Nộp bài</button>
    </div>
</form>
</div>
</body>
</html>
