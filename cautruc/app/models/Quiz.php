<?php
    require_once __DIR__ . "./../models/db.php";

    // INNER JOIN: Là 2 bảng phải có kết quả
    // LEFT JOIN ngược lạilại
    function getAllQuiz(){
        $sql = "SELECT debai.*, COUNT(cauhoi.id_ch) AS so_cau
                FROM debai
                LEFT JOIN cauhoi ON debai.id_db = cauhoi.id_db
                GROUP BY debai.id_db;
        ";
        return getData($sql);
    }

    function getQuiz($id_db){
        $sql = "SELECT debai.ten_db, cauhoi.*
                FROM debai
                INNER JOIN cauhoi ON debai.id_db = cauhoi.id_db
                WHERE debai.id_db = $id_db
        ";
        return getData($sql);
    }

    function getAnswer($id_db){
        $sql = "SELECT dapan.*
                FROM dapan
                JOIN cauhoi ON cauhoi.id_ch = dapan.id_ch
                WHERE cauhoi.id_db = $id_db;
        ";
        return getData($sql);
    }

    function searchQuiz($key){
            $sql = "SELECT debai.*, COUNT(cauhoi.id_ch) AS so_cau
                FROM debai
                LEFT JOIN cauhoi ON debai.id_db = cauhoi.id_db
                WHERE debai.ten_db  LIKE '%$key%'
                GROUP BY debai.id_db;
        ";
        return getData($sql);
    }
?>