<?php
    namespace App\Controllers\Client;

    use App\Controllers\BaseController;
    use App\Models\QuizModel;

    class QuizController extends BaseController{
        protected $model;

        public function __construct(){
            $this -> model = new QuizModel();
        }

        public function startQuiz($id=0){

            unset($_SESSION["quiz"]);
            $id = (isset($id) && is_numeric($id)) ? $id : 0;
            $quiz = $this -> model -> getQuiz($id);

            if(empty($quiz)){
                echo "<script>alert('Quiz không tồn tại [Hoặc không có câu hỏi]')</script>";
                echo "<script>window.location.href='". route("homeclient") ."'</script>";
            }else{
                $_SESSION["quizstatus"] = 1;
                // xu ly o day
                // echo "<pre>";
                // var_dump($quiz);
                $_SESSION["quiz"]["id_quiz"] = $id;
                $_SESSION["quiz"]["ten_quiz"] = $quiz[0]["ten_quiz"];
                $_SESSION["quiz"]["socau"] = count($quiz);
                $_SESSION["quiz"]["count"] = 0;
                $_SESSION["quiz"]["cauhoi"] = $quiz;

                // var_dump($_SESSION["quiz"]);
                $this -> render("client/quiz/question1.blade.php",[]);

            }
        }

        public function choose(){
            if(!empty($_SESSION["quiz"])){
                $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = $_POST["choose"];
                echo $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"];
            }else{
                echo "Lỗi";
            }
        }

        public function next(){
            if($_SESSION["quiz"]["count"] < ($_SESSION["quiz"]["socau"]-1)){
                if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
                    $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
                }
                $_SESSION["quiz"]["count"]++;
                echo $_SESSION["quiz"]["count"];
            }else{
                echo "Không next được nữa: " . $_SESSION["quiz"]["count"];
            }
        }

        public function pre(){
            if ($_SESSION["quiz"]["count"] > 0) {
                if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
                    $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
                }
                $_SESSION["quiz"]["count"]--;
                echo $_SESSION["quiz"]["count"];
            } else {
                echo "Không lùi được nữa: " . $_SESSION["quiz"]["count"];
            }
        }

        public function submit(){
            if(empty($_SESSION["quiz"])){
                echo "<script>alert('Không tồn tại')</script>";
                // echo "<script>window.location.href='". route("homeclient") ."'</script>";
            }elseif($_SESSION["quiz"]["count"] != $_SESSION["quiz"]["socau"] - 1){
                echo "<script>alert('Không tồn tại')</script>";
                // echo "<script>window.location.href='". route("homeclient") ."'</script>";

            }else{
                if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
                    $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
                }
        
                // echo "<pre>";
                // var_dump($_SESSION["quiz"]);
                // var_dump(getAnswer($_SESSION["quiz"]["id_db"]));
                $answer = $this -> model -> getAnswer($_SESSION["quiz"]["id_quiz"]);
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
                unset($_SESSION["quiz"]);
                echo "<script>window.location.href='". route("homeclient") ."'</script>";
            }
            
        }
    }
?>