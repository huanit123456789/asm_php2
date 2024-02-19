<?php
require_once __DIR__ . "./../../function/ValidateForm.php";

// ===============================ADD ACCOUNT===============================================
function signUpClient(){
    if(empty($_SESSION["account"])){

        if(isset($_POST["submit"])){
            signUpClient2();
        }

        signUpClient1();
    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }
}

function signUpClient1()
{
    require_once __DIR__ . "./../../views/client/Header.php";
    require_once __DIR__ . "./../../views/client/SignUp.php";
    require_once __DIR__ . "./../../views/client/Footer.php";
    unset($_SESSION["validation"]);
}

function signUpClient2()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $check1 = validationName($_POST["ten"]);
        $check2 = validationEmail($_POST["email"]);
        $check3 = validationPass($_POST["mk1"]);
        $check4 = validationPass2($_POST["mk1"], $_POST["mk2"]);

        if ($check1 && $check2 && $check3 && $check4) {
            if (addAccount($_POST["ten"], "", $_POST["email"], $_POST["mk1"], 2)) {
                echo "<script>alert('Đăng ký thành công')</script>";
                echo "<script>window.location.href='?url=signinclient'</script>";
            } else {
                echo "<script>alert('Đăng ký không thành công')</script>";
            }
        }
    }
}


// ===============================EDIT ACCOUNT===============================================
function editAccountClient(){
    if(!empty($_SESSION["account"])){

        if(isset($_POST["submit"])){
            editAccountClient2();
        }

        editAccountClient1();
    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }
}

function editAccountClient1(){
    require_once __DIR__ . "./../../views/client/Header.php";
    $account = getAccount($_SESSION["account"]["id_tk"]);
    require_once __DIR__ . "./../../views/client/EditAccount.php";
    require_once __DIR__ . "./../../views/client/Footer.php";
    unset($_SESSION["validation"]);
}

function editAccountClient2(){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $check1 = validationName($_POST["ten"]);
        $check2 = validationImage2($_FILES["anh"]);
        $check3 = validationPass($_POST["mk"]);

        if($check1 && $check2 && $check3){
            $account = getAccount($_SESSION["account"]["id_tk"]);

            if($_FILES["anh"]["size"] == 0){
                $image = $account["anh_tk"];
            }else{
                $image = "./public/image/" . time() . $_FILES["anh"]["name"];
                $check1 = move_uploaded_file($_FILES["anh"]["tmp_name"], $image);
            }

            if ($check1) {
                if (!empty($account["anh_tk"])) {
                    unlink($account["anh_tk"]);
                }

                if (updateAccount($account["id_tk"], $_POST["ten"], $image, $_POST["mk"])) {
                    unset($_SESSION["validation"]);
                    echo "<script>alert('Cập nhật thành công');window.location.href='?url=clienthomepage'</script>";
                } else {
                    echo "<script>alert('Cập nhật không thành công')</script>";
                }
            } else {
                echo "<script>alert('Tải ảnh không thành công')</script>";
            }
        }
    }
}

