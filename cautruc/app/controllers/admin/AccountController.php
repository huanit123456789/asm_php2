<?php
require_once __DIR__ . "./../../models/Account.php";
require_once __DIR__ . "./../../function/ValidateForm.php";


function listAccount()
{

    if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){
        $listAccount = getAllAccount();
        require_once __DIR__ . "./../../views/admin/Header.php";
        require_once __DIR__ . "./../../views/admin/ListAccount.php";
        require_once __DIR__ . "./../../views/admin/Footer.php";
    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }
}


function editAccountAdmin1($id_tk)
{
    $account = getAccount($id_tk);
    if (isset($account)) {
        $_SESSION["editaccountadmin"] = $account["id_tk"];
    } else {
        unset($_SESSION["editaccountadmin"]);
    }
    require_once __DIR__ . "./../../views/admin/Header.php";
    require_once __DIR__ . "./../../views/admin/EditAccount.php";
    require_once __DIR__ . "./../../views/admin/Footer.php";
    unset($_SESSION["validation"]);
}

function editAccountAdmin2($id_tk)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($id_tk == 0) {
            echo "<script>window.location.href='?url=editaccountadmin&id_tk=0'</script>";
        } else {
            $check1 = validationName($_POST["ten"]);
            $check2 = validationPass($_POST["mk"]);
            $check3 = validationImage2($_FILES["anh"]);

            if ($check1 && $check2 && $check3) {
                $account = getAccount($id_tk);
                // NEU KhONG CO ANH
                if ($_FILES["anh"]["size"] == 0) {
                    $image = $account["anh_tk"];
                } else {
                    $image = "./public/image/" . time() . $_FILES["anh"]["name"];

                    $check1 = move_uploaded_file($_FILES["anh"]["tmp_name"], $image);
                }

                if ($check1) {
                    if (!empty($account["anh_tk"])) {
                        unlink($account["anh_tk"]);
                    }

                    if (updateAccount($account["id_tk"], $_POST["ten"], $image, $_POST["mk"])) {
                        unset($_SESSION["editaccountadmin"]);
                        unset($_SESSION["validation"]);
                        echo "<script>alert('Cập nhật thành công');window.location.href='?url=listaccount'</script>";
                    } else {
                        echo "<script>alert('Cập nhật không thành công')</script>";
                    }
                } else {
                    echo "<script>alert('Tải ảnh không thành công')</script>";
                }
            }
        }
    }
}

function editAccountAdmin(){
    if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){

        if(isset($_POST["submit"])){
            editAccountAdmin2($_SESSION["editaccountadmin"]??0);
        }

        if(isset($_GET["id_tk"])){
            if(is_numeric($_GET["id_tk"])){
                $id_tk = $_GET["id_tk"];
            }else{
                $id_tk=0;
            }
        }else{
            $id_tk = $_SESSION["editaccountadmin"]??0;
        }
    
        editAccountAdmin1($id_tk);
    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }
}




// ================================DELETE ACCOUNT=================================================

function deleteAccountController()
{

    if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){
        $id_tk = (isset($_GET["id_tk"]) && is_numeric($_GET["id_tk"]) ? $_GET["id_tk"] : 0);

        if ($id_tk == 0) {
            echo "<script>alert('Tài khoản không tồn tại')</script>";
        } elseif ($id_tk == $_SESSION["account"]["id_tk"]) {
            echo "<script>alert('Không được xóa tài khoản đang dùng')</script>";
        } else {
            deleteAccount($id_tk);
        }
        echo "<script>window.location.href='?url=listaccount'</script>";

    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }

    
}



// ==================================ADD ACCOUNT==============================================
function addAccountController(){
    if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){

        if(isset($_POST["submit"])){
            addAccount2();
        }
        
        addAccount1();
    }else{
        echo "<script>window.location.href='?url=/'</script>";
    }
}

function addAccount1()
{
    require_once __DIR__ . "./../../views/admin/Header.php";
    require_once __DIR__ . "./../../views/admin/AddAccount.php";
    require_once __DIR__ . "./../../views/admin/Footer.php";
    unset($_SESSION["validation"]);
}

function addAccount2()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $check1 = validationName($_POST["ten"]);
        $check2 = validationImage($_FILES["anh"]);
        $check3 = validationEmail($_POST["email"]);
        $check4 = validationPass($_POST["mk"]);
        $check5 = validationRole($_POST["id_cv"]);

        if ($check1 && $check2 && $check3 && $check4 && $check5) {
            $image = "./public/image/" . time() . $_FILES["anh"]["name"];

            if (move_uploaded_file($_FILES["anh"]["tmp_name"], $image)) {
                if (addAccount($_POST["ten"], $image, $_POST["email"], $_POST["mk"], $_POST["id_cv"])) {
                    unset($_SESSION["validation"]);
                    echo "<script>alert('Thêm tài khoản thành công')</script>";
                    echo "<script>window.location.href='?url=listaccount'</script>";
                } else {
                    echo "<script>alert('Thêm tài khoản không thành công')</script>";
                }
            } else {
                echo "<script>alert('Thêm ảnh không thành công')</script>";
            }
        }
    }
}
