<?php
    require_once __DIR__ . "./../../function/ValidateForm.php";
    require_once __DIR__ . "./../../models/Account.php";


    // ======================================DANG NHAP=============================================
    function signInAdmin1(){
        require_once __DIR__ . "./../../views/admin/SignIn.php";
        unset($_SESSION["validation"]);
    }



    function signInAdmin2(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $check1 = validationEmail($_POST["email"]);
            $check2 = validationPass($_POST["pass"]);

            if($check1 && $check2){
                $tk = checkAccountAdmin($_POST["email"],$_POST["pass"]);
                if(!empty($tk)){
                    $_SESSION["account"]["id_cv"] = $tk["id_cv"];
                    $_SESSION["account"]["id_tk"] = $tk["id_tk"];
                    unset($tk);
                    unset($_SESSION["validation"]);
                    echo "<script>window.location.href='index.php?url=adminhomepage'</script>";
                }else{
                    echo "<script>alert('Đăng nhập không thành công')</script>";
                }
            }
        }
    }


    function signInAdmin(){
        if(empty($_SESSION["account"])){
            if(isset($_POST["signin"])){
                signInAdmin2();
            }
            signInAdmin1();
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }



    // ==========================================DANG XUAT========================================
    function logOutAdmin(){
        if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){
            session_destroy();
            echo "<script>window.location.href='index.php?url=signinadmin'</script>";
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }
?>