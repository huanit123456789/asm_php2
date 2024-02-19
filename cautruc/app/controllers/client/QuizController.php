<?php
    require_once __DIR__ . "./../../models/Quiz.php";

    

    // ===========================BAT DAU LAM QUIZ==========================================
    function startQuiz(){

        // fix 2 quiz 1 luc
        

        if(empty($_SESSION["account"])){
            echo "<script>alert('Vui lòng đăng nhập để sủ dụng chức năng này')</script>";
            echo "<script>window.location.href='?url=/'</script>";
        }else{
            startQuiz1((isset($_GET["id_db"])&&is_numeric($_GET["id_db"]))?$_GET["id_db"]:0);
        }
    } 

    function startQuiz1($id_db){

        unset($_SESSION["quiz"]);
        if($id_db == 0){
            echo "<script>alert('Quiz không tồn tại')</script>";
            echo "<script>window.location.href='?url=/'</script>";
        }else{
            $quiz = getQuiz($id_db);
            if(empty($quiz)){
                echo "<script>alert('Quiz không tồn tại [Hoặc không có câu hỏi]')</script>";
                echo "<script>window.location.href='?url=clienthomepage'</script>";
            }else{
                $_SESSION["quizstatus"] = 1;
                // xu ly o day
                // echo "<pre>";
                // var_dump($quiz);
                $_SESSION["quiz"]["id_db"] = $id_db;
                $_SESSION["quiz"]["ten_db"] = $quiz[0]["ten_db"];
                $_SESSION["quiz"]["socau"] = count($quiz);
                $_SESSION["quiz"]["count"] = 0;
                $_SESSION["quiz"]["cauhoi"] = $quiz;

                // var_dump($_SESSION["quiz"]);

                require_once __DIR__ . "./../../views/client/Question.php";
            }
        }
    }

    function submitQuiz(){
        if(empty($_SESSION["account"]) || empty($_SESSION["quiz"]) || !isset($_SESSION["quiz"]["count"]) || !isset($_SESSION["quiz"]["socau"]) || ($_SESSION["quiz"]["count"] != ($_SESSION["quiz"]["socau"] - 1))){
            echo "<script>alert('Lỗi')</script>";
            echo "<script>window.location.href='?url=clienthomepage'</script>";
        }else{
            submitQuiz1();
        }
    }

    function submitQuiz1(){
        
        if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
            $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
        }

        // echo "<pre>";
        // var_dump($_SESSION["quiz"]);
        // var_dump(getAnswer($_SESSION["quiz"]["id_db"]));
        $answer = getAnswer($_SESSION["quiz"]["id_db"]);
        // print_r($_SESSION["quiz"]["cauhoi"]);
        // print_r($answer);

        $count = 0;
        // 2 Vòng lặp mới chạy được do các câu hỏi có thể k nằm liên tiếp với nhau
        for($i = 0; $i < $_SESSION["quiz"]["socau"]; $i++){
            for($j = 0; $j < count($answer); $j++){
                if($_SESSION["quiz"]["cauhoi"][$i]["choose"] == $answer[$j]["da_da"] && $_SESSION["quiz"]["cauhoi"][$i]["id_ch"] == $answer[$j]["id_ch"]){
                    $count++;
                    break;
                }
            }
        }

        echo "<script>alert('Trả lời đúng: ". $count ."/" . $_SESSION["quiz"]["socau"] ."')</script>";
        echo "<script>window.location.href='?url=clienthomepage'</script>";

        unset($_SESSION["quiz"]);
    }
?>