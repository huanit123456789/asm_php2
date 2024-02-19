<?php
    require_once __DIR__ . "./../../models/Quiz.php";

    function clientHomePage(){  
        if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])){
            $listAllQuiz = searchQuiz($_GET["search"]);

        }else{
            $listAllQuiz = getAllQuiz();
        }

        require_once __DIR__ . "./../../views/client/Header.php";
        require_once __DIR__ . "./../../views/client/Home.php";
        require_once __DIR__ . "./../../views/client/Footer.php";

        unset($listAllQuiz);
    }
?>