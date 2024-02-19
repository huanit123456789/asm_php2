<?php
    session_start();

    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\RouteCollector;

    $url = $_GET["url"]??"homeclient";

    $route = new RouteCollector();

    // FILTER
    $route -> filter('neukhongphaiadminthiout',function(){
        if(empty($_SESSION["account"]) || $_SESSION["account"]["id_cv"] != 1){
            header("Location: ". route("signinadmin"));
        }
    });


    $route -> filter("neuchuadangnhapthiout",function(){
        if(empty($_SESSION["account"])){
            header("Location: ". route("homeclient"));
        }
    });

    $route -> filter("neudangnhaproithiout",function(){
        if(isset($_SESSION["account"])){
            header("Location: ". route("homeclient"));
        }
    });

    // Ben admin da dang nhap
    $route -> filter('neuadmindangnhapthiout',function(){
        if(isset($_SESSION["account"])){
            if($_SESSION["account"]["id_cv"] == 1){
                header("Location: ". route("homeadmin"));
            }
        }
    });

    $route -> filter('neuclientdangnhapthiout',function (){
        if(isset($_SESSION["account"])){
            if($_SESSION["account"]["id_cv"] == 2){
                header("Location: ". route("homeclient"));
            }
        }
    });

    $route -> filter("neuchuadangnhapthioutquiz",function(){
        if(empty($_SESSION["account"])){
            echo "<script>alert('Vui lòng đăng nhập để sử dụng chức năng')</script>";
            echo "<script>window.location.href=`". route("homeclient") ."`</script>";
        }
    });


    // ADMIN==============================================================================
    $route -> group(["before" => "neukhongphaiadminthiout"], function($route){
        $route -> get("homeadmin",[App\Controllers\Admin\HomeController::class,'home']);

        $route -> get("listaccount",[App\Controllers\Admin\AccountController::class,'listAccount']);

        $route -> get("deleteaccount/{id}?",[App\Controllers\Admin\AccountController::class,'deleteAccount']);

        $route -> get("editaccount/{id}?",[App\Controllers\Admin\AccountController::class,'editAccount1']);
        $route -> post("submiteditaccount/{id}?",[App\Controllers\Admin\AccountController::class,'editAccount2']);

        $route -> get("addaccount",[App\Controllers\Admin\AccountController::class,'addAccount1']);
        $route -> post("submitaddaccount",[App\Controllers\Admin\AccountController::class,'addAccount2']);

        $route -> get("editprofileadmin",[App\Controllers\Admin\AccountController::class,'editProfile1']);
        $route -> post("submiteditprofileadmin",[App\Controllers\Admin\AccountController::class,'editProfile2']);

        $route -> get("logoutadmin",[App\Controllers\Admin\HomeController::class,'logOut']);

    });

    $route -> group(["before" => "neuadmindangnhapthiout"], function($route){
        $route -> get("signinadmin",[App\Controllers\Admin\HomeController::class,'signIn1']);
        $route -> post("submitsigninadmin",[App\Controllers\Admin\HomeController::class,'signIn2']);
    });


    // CLIENT=============================================================================
    $route -> get("homeclient", [App\Controllers\Client\HomeController::class,'home']);

    $route -> get("logoutclient",[App\Controllers\Client\HomeController::class,'logout'],["before" => "neuchuadangnhapthiout"]);

    $route -> get("signup",[\App\Controllers\Client\AccountController::class,'addAccount1'],["before" => "neudangnhaproithiout"]);
    $route -> post("submitsignup",[\App\Controllers\Client\AccountController::class,'addAccount2'],["before" => "neudangnhaproithiout"]);

    $route -> get("editprofile",[App\Controllers\Client\AccountController::class,'editaccount1'],["before" => "neuchuadangnhapthiout"]);
    $route -> post("submiteditprofile",[App\Controllers\Client\AccountController::class,'editaccount2'],["before" => "neuchuadangnhapthiout"]);

    $route -> get("forgotpass",[App\Controllers\Client\ForgotPassController::class,'forgotpass1'],["before" => "neudangnhaproithiout"]);
    $route -> post("submitforgotpass",[App\Controllers\Client\ForgotPassController::class,'forgotpass2'],["before" => "neudangnhaproithiout"]);

    $route -> get("signinclient",[\App\Controllers\Client\HomeController::class,'signIn1'],["before" => "neuclientdangnhapthiout"]);
    $route -> post("submitsigninclient",[App\Controllers\Client\HomeController::class,'signIn2'],["before" => "neuclientdangnhapthiout"]);


    // quiz
    
    $route -> get("quiz/{id}?",[App\Controllers\Client\QuizController::class,'startQuiz'],["before" => "neuchuadangnhapthioutquiz"]);


    // AJAX
    $route -> post("chooseajax",[\App\Controllers\Client\QuizController::class,'choose']);
    $route -> post("nextajax",[\App\Controllers\Client\QuizController::class,'next']);
    $route -> post("preajax",[\App\Controllers\Client\QuizController::class,'pre']);
    $route -> get("submit",[\App\Controllers\Client\QuizController::class,'submit']);

    $dispatcher = new Dispatcher($route -> getData());
    $dispatcher -> dispatch($_SERVER["REQUEST_METHOD"],$url);
?>