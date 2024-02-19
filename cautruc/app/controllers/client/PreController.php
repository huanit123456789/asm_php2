<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION["quiz"]["count"] > 0) {
        if(empty($_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"])){
            $_SESSION["quiz"]["cauhoi"][$_SESSION["quiz"]["count"]]["choose"] = 0;
        }
        $_SESSION["quiz"]["count"]--;
        echo $_SESSION["quiz"]["count"];
    } else {
        echo "Không lùi được nữa: " . $_SESSION["quiz"]["count"];
    }
}
?>