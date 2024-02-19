<?php
    namespace App\Controllers\Admin;

    use App\Controllers\BaseController;
    use App\Models\AccountModel;
    use App\Traits\Validation;

    class AccountController extends BaseController{
        protected $model;

        use Validation;

        public function __construct(){
            $this -> model = new AccountModel();
        }

        public function listAccount(){
            $title = "Danh sách tài khoản";
            $listAccount = $this -> model -> getAllAccount();
            $this -> render("admin/account/ListAccount.blade.php",compact('title','listAccount'));
        }

        public function deleteAccount($id = 0){
            $id = (isset($id) && is_numeric($id))? $id : 0;

            if($id == 0){
                echo "<script>alert('Tài khoản không tồn tại')</script>";
            }elseif($id == $_SESSION["account"]["id_tk"]){
                echo "<script>alert('Không được xóa tài khoản đang dùng')</script>";
            }else{
                $account = $this -> model -> getAccount($id);
                if(!$account){
                    echo "<script>alert('Tài khoản không tồn tại')</script>";
                }else{
                    if($this -> model -> deleteAccount($id)){
                        unlink($account["anh_tk"]);
                    }else{
                        echo "<script>alert('Lỗi')</script>";
                    }
                }
            }
            // die();
            echo "<script>window.location.href=`". route("listaccount") ."`</script>";
        }

        public function editAccount1($id = 0){
            $title = "Chỉnh sửa tài khoản";
            $id = (isset($id) && is_numeric($id)) ? $id : 0;

            if($id == 0){
                $account = NULL;
            }else{
                $account = $this -> model -> getAccount($id);
            }
            $this -> render("admin/account/EditAccount.blade.php",compact('title','account'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function editAccount2($id=0){
            if(isset($_POST["submiteditaccount"])){
                $check1 = $this -> validationName($_POST["ten_tk"]);
                $check2 = $this -> validationImage2($_FILES["anh_tk"]);
                $check3 = $this -> validationPass($_POST["matkhau_tk"]);
                $check4 = $this -> validationRole($_POST["id_cv"]);

                if ($check1 && $check2 && $check3 && $check4) {

                    if($_FILES["anh_tk"]["size"] != 0){
                        $account = $this -> model -> getAccount($id);
                        $image = IMAGE_DIR . time() . $_FILES["anh_tk"]["name"];

                        if(move_uploaded_file($_FILES["anh_tk"]["tmp_name"], $image)){
                            if (!empty($account["anh_tk"])) {
                                unlink($account["anh_tk"]);
                            }

                            if($this -> model -> updateAccount1($id,$_POST["ten_tk"],$image,$_POST["matkhau_tk"],$_POST["id_cv"])){
                                unset($_SESSION["validation"]);
                                unset($_SESSION["post"]);
                                echo "<script>window.location.href=`". route("listaccount") ."`</script>";
                            }else{
                                echo "<script>alert('Cập nhật không thành công');</script>";
                                echo "<script>window.location.href=`". route("editaccount/" . $id) ."`</script>";
                            }

                        }else{
                            echo "<script>alert('Cập nhật ảnh thành công');</script>";
                            echo "<script>window.location.href=`". route("editaccount/" . $id) ."`</script>";
                        }


                    }else{
                        if($this -> model -> updateAccount2($id,$_POST["ten_tk"],$_POST["matkhau_tk"], $_POST["id_cv"])){
                            unset($_SESSION["validation"]);
                            unset($_SESSION["post"]);
                            // die();
                            echo "<script>window.location.href=`". route("listaccount") ."`</script>";
                        }else{
                            echo "<script>alert('Cập nhật không thành công');</script>";
                            echo "<script>window.location.href=`". route("editaccount/" . $id) ."`</script>";
                        }
                    }
                    
                }else{
                    $_SESSION['post'] = $_POST;
                    echo "<script>window.location.href=`". route("editaccount/" . $id) ."`</script>";
                }
            }
        }

        public function addAccount1(){
            $title = "Thêm tài khoản";
            $this -> render("admin/account/AddAccount.blade.php",compact('title'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function addAccount2(){
            if(isset($_POST["submitaddaccount"])){
                $check1 = $this -> validationName($_POST["ten_tk"]);
                $check2 = $this -> validationImage($_FILES["anh_tk"]);
                $check3 = $this -> validationEmail($_POST["email_tk"]);
                $check4 = $this -> validationPass($_POST["matkhau_tk"]);
                $check5 = $this -> validationRole($_POST["id_cv"]);

                if($check1 && $check2 && $check3 && $check4 && $check5){
                    $image = IMAGE_DIR . time() . $_FILES["anh_tk"]["name"];

                    if (move_uploaded_file($_FILES["anh_tk"]["tmp_name"], $image)) {
                        if ($this -> model -> addAccount($_POST["ten_tk"], $image, $_POST["email_tk"], $_POST["matkhau_tk"], $_POST["id_cv"])) {
                            unset($_SESSION["validation"]);
                            unset($_SESSION["post"]);
                            echo "<script>window.location.href='". route("listaccount") ."'</script>";
                        } else {
                            echo "<script>alert('Thêm tài khoản không thành công')</script>";
                            echo "<script>window.location.href = `". route("addaccount") ."`</script>";
                        }
                    } else {
                        echo "<script>alert('Thêm ảnh không thành công')</script>";
                        echo "<script>window.location.href = `". route("addaccount") ."`</script>";
                    }
                }else{
                    $_SESSION["post"] = $_POST;
                    echo "<script>window.location.href = `". route("addaccount") ."`</script>";
                }

            }
        }

        public function editProfile1(){
            $title = "Chỉnh sửa thông tin";
            $account = $this -> model -> getAccount($_SESSION["account"]["id_tk"]);
            $this -> render("admin/account/EditProfile.blade.php",compact('title','account'));
            unset($_SESSION["validation"]);
            unset($_SESSION["post"]);
        }

        public function editProfile2(){
            if(isset($_POST["submiteditprofileadmin"])){
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

                            if($this -> model -> updateAccount1($_SESSION["account"]["id_tk"],$_POST["ten_tk"],$image,$_POST["matkhau_tk"],1)){
                                unset($_SESSION["validation"]);
                                unset($_SESSION["post"]);
                                echo "<script>alert('Cập nhật thành công')</script>";
                                echo "<script>window.location.href=`". route("homeadmin") ."`</script>";
                            }else{
                                echo "<script>alert('Cập nhật không thành công');</script>";
                                echo "<script>window.location.href=`". route("editprofileadmin") ."`</script>";
                            }

                        }else{
                            echo "<script>alert('Cập nhật ảnh không thành công');</script>";
                            echo "<script>window.location.href=`". route("editprofileadmin") ."`</script>";
                        }


                    }else{
                        if($this -> model -> updateAccount2($_SESSION["account"]["id_tk"],$_POST["ten_tk"],$_POST["matkhau_tk"], 1)){
                            unset($_SESSION["validation"]);
                            unset($_SESSION["post"]);
                            echo "<script>alert('Cập nhật thành công')</script>";
                            echo "<script>window.location.href=`". route("homeadmin") ."`</script>";
                        }else{
                            echo "<script>alert('Cập nhật không thành công');</script>";
                            echo "<script>window.location.href=`". route("editprofileadmin") ."`</script>";
                        }
                    }
                    
                }else{
                    $_SESSION['post'] = $_POST;
                    echo "<script>window.location.href=`". route("editprofileadmin") ."`</script>";
                }
            }
        }
    }
?>