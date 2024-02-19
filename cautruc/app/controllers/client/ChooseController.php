<?php

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_SESSION["quiz"])){
            $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = $_POST["choose"];
            echo $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"];
        }else{
            echo "Lỗi";
        }
    }
?>