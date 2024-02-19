<?php
    require_once __DIR__ . "./env.php";

    function getConnect(){
        return new mysqli(DBSEVER,DBUSER,DBPASS,DBNAME);
    }

    // true: lay tat ca  false: lay 1 cai
    function getData($sql,$type=true){
        $conn = getConnect();

        $stmt = $conn -> prepare($sql);
        
        if(!$stmt){
            return false;
        }

        $stmt -> execute();
        
        if($type){
            return ($stmt->get_result())-> fetch_all(MYSQLI_ASSOC);
        }
        return ($stmt->get_result())-> fetch_assoc();
    }

    function setData($sql){
        $conn = getConnect();
        $stmt = $conn->prepare($sql);
        if(!$stmt){
            return false;
        }
        // true false
        return $stmt->execute();
    }
?>