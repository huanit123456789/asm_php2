<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Quiz Lmao</title>
    <link rel="shortcut icon" type="image/png" href="./public/assets/images/logos/favicon.png" />
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="./public/js/function.js"></script>
</head>

<body className='snippet-body'>
    <!-- HEADER -->
    <div class="header2 bg-success-gradiant">
        <div class="">
            <!-- Header 1 code -->
            <nav class="navbar navbar-expand-lg h2-nav">
                <a class="navbar-brand" href="?url=">Quiz System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-menu">MENU</span>
                </button>
                <div class="collapse navbar-collapse hover-dropdown" id="header2">



                    <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="index.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:500px" name="search" value="<?= $_GET["search"]??"" ?>">
                        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="submit" value="Tìm kiếm"></input>
                    </form>


                    <?php
                    if (isset($_SESSION["account"])) {
                        echo "
                        <ul class='navbar-nav ml-auto'>
                        <li class='nav-item dropdown'>
                            <a href='#' class='nav-link dropdown-toggle' id='accountDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Account
                            </a>
                            <div class='dropdown-menu' aria-labelledby='accountDropdown'>
                                <a class='dropdown-item' href='?url=editaccountclient'>Chỉnh sửa tài khoản</a>";

                        if ($_SESSION["account"]["id_cv"] == 1) {
                            echo "
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='?url=adminhomepage'>Quản trị</a>
                                ";
                        }

                        echo "
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='index.php?url=logoutclient'>Đăng xuất</a>
                        </div>
                        </li>
                    </ul>
                    ";
                    } else {
                        echo '<ul class="navbar-nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="?url=signinclient">Login</a></li>
                                <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href="?url=signupclient">Sign up</a></li>
                            </ul>';
                    }
                    ?>

                </div>
            </nav>
            <!-- End Header 1 code -->
        </div>
    </div>