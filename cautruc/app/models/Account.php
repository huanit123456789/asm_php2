<?php
    require_once __DIR__ . "./db.php";

    function checkAccountUser($email,$pass){
        $sql = "SELECT * FROM taikhoan WHERE email_tk LIKE '$email' AND mk_tk LIKE '$pass' AND id_cv =2";
        return getData($sql,false);
    }

    function checkAccountAdmin($email,$pass){
        $sql = "SELECT * FROM taikhoan WHERE email_tk LIKE '$email' AND mk_tk LIKE '$pass' AND id_cv =1";
        return getData($sql,false);
    }

    function getAllAccount(){
        $sql = "SELECT * FROM taikhoan";
        return getData($sql);
    }

    function getAccount($id_tk){
        $sql = "SELECT * FROM taikhoan WHERE id_tk =" . $id_tk;
        return getData($sql,false);
    }

    function updateAccount($id_tk,$name,$anh,$pass){
        $sql = "UPDATE taikhoan SET ten_tk = '$name', anh_tk = '$anh', mk_tk = '$pass' WHERE id_tk = $id_tk";
        return setData($sql); 
    }

    function deleteAccount($id_tk){
        $sql = "DELETE FROM taikhoan WHERE id_tk = $id_tk";
        return setData($sql);
    }

    function addAccount($name, $image, $email, $pass, $id_cv){
        $sql = "INSERT INTO taikhoan(ten_tk,anh_tk, email_tk, mk_tk, id_cv) VALUE('$name','$image','$email','$pass',$id_cv)";
        return setData($sql);
    }

    function getEmail($email){
        $sql = "SELECT email_tk, mk_tk, ten_tk FROM taikhoan WHERE email_tk LIKE '$email' AND id_cv=2";
        return getData($sql,false);
    }
?>