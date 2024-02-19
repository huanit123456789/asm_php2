<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_SESSION["quiz"]["count"] < ($_SESSION["quiz"]["socau"]-1)){
            if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
                $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
            }
            $_SESSION["quiz"]["count"]++;
            echo $_SESSION["quiz"]["count"];
        }else{
            echo "Không next được nữa: " . $_SESSION["quiz"]["count"];
        }
    }
?>