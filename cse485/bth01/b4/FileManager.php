<?php
    require_once 'db.php';
    class FileManager {
        private $db;
        public function __construct(Database $db)
        {
            $this->db = $db->pdo;
        }
        // Thêm dữ liệu file txt vào phpmyadmin
        public function filetxt($question, $choice_a, $choice_b, $choice_c, $choice_d, $answer)
        {
            $stmt = $this->db->prepare("INSERT INTO multichoice(question, choice_a, choice_b, choice_c, choice_d, answer)
            VALUES(:question, :choice_a, :choice_b, :choice_c, :choice_d, :answer) ");
            $stmt->execute(['question' => $question,
            'choice_a' => $choice_a,
            'choice_b' => $choice_b,
            'choice_c' => $choice_c,
            'choice_d' => $choice_d,
            'answer' =>$answer,
            ]);
        }
        // Thêm dữ liệu file csv vào phpmyadmin
        public function filecsv($username, $password, $lastname, $firstname, $city, $email, $course1)
        {
            $stmt = $this->db->prepare("INSERT INTO excelcsv(username, password, lastname, firstname, city, email, course1)
            VALUES (:username, :password, :lastname, :firstname, :city, :email, :course1)");
            $stmt->execute(['username' => $username,
            'password' => $password,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'city' => $city,
            'email' => $email,
            'course1' => $course1
            ]);
        }
    }
?> 
