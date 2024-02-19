<?php
    function adminHomePage(){
        if(isset($_SESSION["account"]["id_cv"]) && $_SESSION["account"]["id_cv"] == 1){
            require_once __DIR__ . "./../../views/admin/header.php";
            require_once __DIR__ . "./../../views/admin/home.php";
            require_once __DIR__ . "./../../views/admin/footer.php";
        }else{
            echo "<script>window.location.href='?url=/'</script>";
        }
    }
?>