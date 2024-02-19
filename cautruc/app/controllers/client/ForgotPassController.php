<?php
    require_once __DIR__ . "./../../function/ValidateForm.php";
    require_once __DIR__ . "./../../../phpmailer/SendMail.php";

    function forgotPass(){
        if(empty($_SESSION["account"])){
            if(isset($_POST["submit"])){
                forgotPass2();
            }
            forgotPass1();
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }

    function forgotPass1(){
        require_once __DIR__ . "./../../views/client/ForgotPass.php";
        unset($_SESSION["validation"]);
    }

    function forgotPass2(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $check1 = validationEmail($_POST["email"]);

            if($check1){
                $tk = getEmail($_POST["email"]);
                if(empty($tk)){
                    echo "<script>alert('Tài khoản không tồn tại')</script>";
                }else{
                    // bắt đầu gửi email
                    $check = sendMail($tk["email_tk"],$tk["mk_tk"],$tk["ten_tk"]);
                    if($check){
                        echo "<script>alert('Vui lòng kiểm tra gmail để lấy mật khẩu')</script>";
                        echo "<script>window.location.href='?url=signinclient'</script>";
                    }else{
                        echo "<script>alert('Gửi mail không thành công')</script>";
                    }
                }
            }
        }
    }

?>