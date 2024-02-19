<?php
    namespace App\Controllers\Admin;

    use App\Controllers\BaseController;
    use App\Models\AccountModel;
    use App\Traits\Validation;

    class HomeController extends BaseController{
        protected $model;

        use Validation;

        public function __construct(){
            $this -> model = new AccountModel();
        }

        public function home(){
            $title = "Admin";
            $this -> render("admin/home/Home.blade.php",compact('title'));
        }

        public function signIn1(){
            $this -> render("admin/home/signin.blade.php",[]);
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function signIn2(){
            if(isset($_POST["submitsignin"])){
                $check1 = $this -> validationEmail($_POST["email_tk"]);
                $check2 = $this -> validationPass($_POST["matkhau_tk"]);

                if($check1 && $check2){
                    $tk = $this -> model -> checkAccountAdmin($_POST["email_tk"],$_POST["matkhau_tk"]);
                        if(!empty($tk)){
                            session_unset();
                            $_SESSION["account"]["id_cv"] = $tk["id_cv"];
                            $_SESSION["account"]["id_tk"] = $tk["id_tk"];
                            unset($tk);
                            echo "<script>window.location.href='". route("homeadmin") ."'</script>";
                        }else{
                            echo "<script>alert('Đăng nhập không thành công')</script>";
                            echo "<script>window.location.href=`". route("signinadmin") ."`</script>";
                        }
                }else{
                    $_SESSION["post"] = $_POST;
                    echo "<script>window.location.href=`". route("signinadmin") ."`</script>";
                }
            }
        }

        public function logOut(){
            session_destroy();
            echo "<script>window.location.href=`". route("signinadmin") ."`</script>";
        }
    }
?>