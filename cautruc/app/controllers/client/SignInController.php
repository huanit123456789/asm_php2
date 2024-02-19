<?php
    require_once __DIR__ . "./../../function/ValidateForm.php";

    // ============================================DANG NHAP========================================
    function signInClient(){
        if(empty($_SESSION["account"])){

            if(isset($_POST["submit"])){
                signInClient2();
            }

            signInClient1();
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }


    function signInClient1(){
        require_once __DIR__ . "./../../views/client/Header.php";
        require_once __DIR__ . "./../../views/client/SignIn.php";
        require_once __DIR__ . "./../../views/client/Footer.php";
        unset($_SESSION["validation"]);
    }

    function signInClient2(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $check1 = validationEmail($_POST["email"]);
            $check2 = validationPass($_POST["mk"]);

            if($check1 && $check2){
                $tk = checkAccountUser($_POST["email"],$_POST["mk"]);
                if(!empty($tk)){
                    $_SESSION["account"]["id_tk"] = $tk["id_tk"];
                    $_SESSION["account"]["id_cv"] = $tk["id_cv"];
                    unset($tk);
                    unset($_SESSION["validation"]);
                    echo "<script>window.location.href='index.php?url=/'</script>";
                }else{
                    echo "<script>alert('Đăng nhập không thành công')</script>";
                }
            }
        }
    }

    // ============================================DANG XUAT========================================
    function logOutClient(){
        session_destroy();
        echo "<script>window.location.href='?url=signinclient'</script>";
    }
?>