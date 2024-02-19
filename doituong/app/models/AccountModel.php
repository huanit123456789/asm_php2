<?php
    namespace App\Models;

    class AccountModel extends BaseModel{

        public function getAllAccount(){
            $this -> sql = "SELECT * FROM taikhoan";
            return $this -> getData();
        }

        public function getAccount($id){
            $this -> sql = "SELECT * FROM taikhoan WHERE id_tk = $id";
            return $this -> getData(false);
        }

        public function deleteAccount($id){
            $this -> sql = "DELETE FROM taikhoan WHERE id_tk = $id";
            return $this -> setData();
        }

        public function updateAccount1($id_tk, $ten_tk, $anh_tk, $matkhau_tk, $id_cv){
            $this -> sql ="UPDATE taikhoan SET ten_tk = '$ten_tk', anh_tk = '$anh_tk', matkhau_tk = '$matkhau_tk', id_cv = $id_cv WHERE id_tk = $id_tk";
            return $this -> setData();
        }

        public function updateAccount2($id_tk, $ten_tk, $matkhau_tk, $id_cv){
            $this -> sql ="UPDATE taikhoan SET ten_tk = '$ten_tk', matkhau_tk = '$matkhau_tk', id_cv = $id_cv WHERE id_tk = $id_tk";
            return $this -> setData();
        }

        public function addAccount($ten_tk,$anh_tk,$email_tk,$matkhau_tk,$id_cv){
            $this -> sql = "INSERT INTO taikhoan(ten_tk,anh_tk, email_tk, matkhau_tk, id_cv) VALUE('$ten_tk','$anh_tk','$email_tk','$matkhau_tk',$id_cv)";
            return $this -> setData();
        }

        public function checkAccountAdmin($email_tk,$matkhau_tk){
            $this -> sql = "SELECT * FROM taikhoan WHERE email_tk LIKE '$email_tk' AND matkhau_tk LIKE '$matkhau_tk' AND id_cv =1";
            return $this -> getData(false);
        }

        public function checkAccountUser($email_tk,$matkhau_tk){
            $this -> sql = "SELECT * FROM taikhoan WHERE email_tk LIKE '$email_tk' AND matkhau_tk LIKE '$matkhau_tk' AND id_cv =2";
            return $this -> getData(false);
        }

        public function getEmail($email_tk){
            $this -> sql = "SELECT email_tk, matkhau_tk, ten_tk FROM taikhoan WHERE email_tk LIKE '$email_tk' AND id_cv=2";
            return $this -> getData(false);
        }
    }
?>