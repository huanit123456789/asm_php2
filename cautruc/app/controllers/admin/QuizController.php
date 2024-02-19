<?php
    require_once __DIR__ . "./../../models/Quiz.php";

    function listQuiz(){
        if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){
            $listQuiz = getAllQuiz();

            require_once __DIR__ . "./../../views/admin/header.php";
            require_once __DIR__ . "./../../views/admin/listQuiz.php";
            require_once __DIR__ . "./../../views/admin/footer.php";
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }
?>