<?php
    namespace App\Controllers\Client;

    use App\Controllers\BaseController;
    use App\Models\AccountModel;
    use App\Models\QuizModel;
    use App\Traits\Validation;

    class HomeController extends BaseController{
        protected $model1;
        protected $model2;

        use Validation;

        public function __construct(){
            $this -> model1 = new QuizModel();
            $this -> model2 = new AccountModel();
        }

        public function home(){
            $title = "Quiz Lmao";

            if(!empty($_GET["submitsearch"])){
                $listQuiz = $this -> model1 -> getAllQuiz($_GET["search"]);
            }else{
                $listQuiz = $this -> model1 -> getAllQuiz("");
            }
            
            $this -> render("client/home/home.blade.php",compact('title','listQuiz'));
        }

        public function signIn1(){
            $title = "Đăng nhập";
            $this -> render("client/home/signin.blade.php",compact('title'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function signIn2(){
            if(isset($_POST["submitsigninclient"])){
                $check1 = $this -> validationEmail($_POST["email_tk"]);
                $check2 = $this -> validationPass($_POST["matkhau_tk"]);

                if($check1 && $check2){
                    $tk = $this -> model2 -> checkAccountUser($_POST["email_tk"],$_POST["matkhau_tk"]);
                    if(!empty($tk)){
                        session_unset();
                        $_SESSION["account"]["id_tk"] = $tk["id_tk"];
                        $_SESSION["account"]["id_cv"] = $tk["id_cv"];
                        unset($tk);
                        echo "<script>window.location.href='". route("homeclient") ."'</script>";
                    }else{
                        echo "<script>alert('Đăng nhập không thành công')</script>";
                        echo "<script>window.location.href=`". route("signinclient") ."`</script>";
                    }
                }else{
                    $_SESSION["post"] = $_POST;
                    echo "<script>window.location.href=`". route("signinclient") ."`</script>";
                }
            }else{
                
            }
        }

        public function logOut(){
            session_destroy();
            echo "<script>window.location.href=`". route("signinclient") ."`</script>";
        }
    }
?>