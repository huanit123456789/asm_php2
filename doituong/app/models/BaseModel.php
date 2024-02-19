<?php
    namespace App\Models;

    use mysqli;

    class BaseModel{
        private $sqli;
        protected $sql;

        public function __construct(){
            $this -> sqli = new mysqli(DB_SEVER,DB_USER,DB_PASS,DB_NAME);
        }

        protected function setData(){
            $stmt = $this -> sqli -> prepare($this -> sql);

            if($stmt){
                return $stmt -> execute();
            }
            return false;
        }

        protected function getData($type = true){
            $stmt = $this -> sqli -> prepare($this -> sql);

            if($stmt){
                if($stmt -> execute()){
                    if($type){
                        return $stmt -> get_result() -> fetch_all(MYSQLI_ASSOC);
                    }else{
                        return $stmt -> get_result() -> fetch_assoc();
                    }
                }
            }
            return false;
        }
    }
?>