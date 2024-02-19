<?php
    namespace App\Controllers\Client;

    use App\Controllers\BaseController;
    use App\Models\AccountModel;
    use App\Traits\Validation;

    class AccountController extends BaseController{
        protected $model;

        use Validation;

        public function __construct(){
            $this -> model = new AccountModel();
        }

        public function addAccount1(){
            $title = "Đăng ký";
            $this -> render("client/account/addaccount.blade.php",compact('title'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function addAccount2(){
            if(isset($_POST["submitsignup"])){
                $check1 = $this -> validationName($_POST["ten_tk"]);
                $check2 = $this -> validationEmail($_POST["email_tk"]);
                $check3 = $this -> validationPass($_POST["matkhau1_tk"]);
                $check4 = $this -> validationPass2($_POST["matkhau1_tk"], $_POST["matkhau2_tk"]);
                
                if ($check1 && $check2 && $check3 && $check4) {
                    if ($this -> model -> addAccount($_POST["ten_tk"], "", $_POST["email_tk"], $_POST["matkhau1_tk"], 2)) {
                        unset($_SESSION["validation"]);
                        unset($_SESSION["post"]);
                        echo "<script>alert('Đăng ký thành công')</script>";
                        echo "<script>window.location.href='". route("signinclient") ."'</script>";
                    } else {
                        echo "<script>alert('Đăng ký không thành công')</script>";
                        echo "<script>window.location.href='". route("signup") ."'</script>";
                    }
                }else{
                    $_SESSION["post"] = $_POST;
                    echo "<script>window.location.href='". route("signup") ."'</script>";
                }
            }
        }

        public function editAccount1(){
            $title = "Chỉnh sửa thông tin";
            $account = $this -> model -> getAccount($_SESSION["account"]["id_tk"]);
            $this -> render("client/account/editaccount.blade.php",compact('title','account'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function editAccount2(){
            if(isset($_POST["submiteditprofile"])){
                $check1 = $this -> validationName($_POST["ten_tk"]);
                $check2 = $this -> validationImage2($_FILES["anh_tk"]);
                $check3 = $this -> validationPass($_POST["matkhau_tk"]);

                if ($check1 && $check2 && $check3) {

                    if($_FILES["anh_tk"]["size"] != 0){
                        $account = $this -> model -> getAccount($_SESSION["account"]["id_tk"]);
                        $image = IMAGE_DIR . time() . $_FILES["anh_tk"]["name"];

                        if(move_uploaded_file($_FILES["anh_tk"]["tmp_name"], $image)){
                            if (!empty($account["anh_tk"])) {
                                unlink($account["anh_tk"]);
                            }

                            if($this -> model -> updateAccount1($_SESSION["account"]["id_tk"],$_POST["ten_tk"],$image,$_POST["matkhau_tk"],$_SESSION["account"]["id_cv"])){
                                unset($_SESSION["validation"]);
                                unset($_SESSION["post"]);
                                echo "<script>alert('Cập nhật thành công')</script>";
                                echo "<script>window.location.href=`". route("homeclient") ."`</script>";
                            }else{
                                echo "<script>alert('Cập nhật không thành công');</script>";
                                echo "<script>window.location.href=`". route("editprofile") ."`</script>";
                            }

                        }else{
                            echo "<script>alert('Cập nhật ảnh không thành công');</script>";
                            echo "<script>window.location.href=`". route("editprofile") ."`</script>";
                        }


                    }else{
                        if($this -> model -> updateAccount2($_SESSION["account"]["id_tk"],$_POST["ten_tk"],$_POST["matkhau_tk"], $_SESSION["account"]["id_cv"])){
                            unset($_SESSION["validation"]);
                            unset($_SESSION["post"]);
                            echo "<script>alert('Cập nhật thành công')</script>";
                            echo "<script>window.location.href=`". route("homeclient") ."`</script>";
                        }else{
                            echo "<script>alert('Cập nhật không thành công');</script>";
                            echo "<script>window.location.href=`". route("editprofile") ."`</script>";
                        }
                    }
                    
                }else{
                    $_SESSION['post'] = $_POST;
                    echo "<script>window.location.href=`". route("editprofile") ."`</script>";
                }
            }
        }
    }
?>