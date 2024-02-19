<?php
    session_start();
    // admin
    require_once __DIR__ . "./app/controllers/admin/SignInController.php";
    require_once __DIR__ . "./app/controllers/admin/HomeController.php";
    require_once __DIR__ . "./app/controllers/admin/AccountController.php";
    require_once __DIR__ . "./app/controllers/admin/QuizController.php";

    // user
    require_once __DIR__ . "./app/controllers/client/HomeController.php";
    require_once __DIR__ . "./app/controllers/client/SignInController.php";
    require_once __DIR__ . "./app/controllers/client/AccountController.php";
    require_once __DIR__ . "./app/controllers/client/ForgotPassController.php";
    require_once __DIR__ . "./app/controllers/client/QuizController.php";

    $url = $_GET["url"]??"/";

    switch($url){
        // admin
        case "signinadmin":
            signInAdmin();
            break;

        case "adminhomepage":
            adminHomePage();
            break;

        case "listaccount":
            listAccount();
            break;

        case "editaccountadmin":
            editAccountAdmin();
            break;

        case "deleteaccount":
            deleteAccountController();
            break;

        case "addaccount":
            addAccountController();
            break;

        case "listquiz":
            listQuiz();
            break;
        case "logoutadmin":
            logOutAdmin();
            break;

        
        
        // user
        case "logoutclient":
            logOutClient();
            break;

        case "signinclient":
            signInClient();
            break;

        case "signupclient":
            signUpClient();
            break;

        case "editaccountclient":
            editAccountClient();
            break;

        case "forgotpass":
            forgotPass();
            break;
        
        case "quiz":
            startQuiz();
            break;
        
        case "submitquiz":
            submitQuiz();
            break;
        
        default:
            clientHomePage();
            break;
    }

    
?>