<?php
    namespace App\Models;

    class QuizModel extends BaseModel{

        public function getAllQuiz($search){
            if($search == ""){
                $this -> sql = "SELECT quiz.*, COUNT(cauhoi.id_ch) AS so_cau
                        FROM quiz
                        LEFT JOIN cauhoi ON quiz.id_quiz = cauhoi.id_quiz
                        GROUP BY quiz.id_quiz;";
            }else{
                $this -> sql = "SELECT quiz.*, COUNT(cauhoi.id_ch) AS so_cau
                            FROM quiz
                            LEFT JOIN cauhoi ON quiz.id_quiz = cauhoi.id_quiz
                            WHERE quiz.ten_quiz  LIKE '%$search%'
                            GROUP BY quiz.id_quiz";
            }
            return $this -> getData();
        }

        public function getQuiz($id){
            $this -> sql = "SELECT quiz.ten_quiz, cauhoi.*
                    FROM quiz
                    INNER JOIN cauhoi ON quiz.id_quiz = cauhoi.id_quiz
                    WHERE quiz.id_quiz = $id";
            return $this -> getData();
        }

        public function getAnswer($id){
            $this -> sql = "SELECT dapan.*
                    FROM dapan
                    JOIN cauhoi ON cauhoi.id_ch = dapan.id_ch
                    WHERE cauhoi.id_quiz = $id;";
            return $this -> getData();
        }
    }
?>