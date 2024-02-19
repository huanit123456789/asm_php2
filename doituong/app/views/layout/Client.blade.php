<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/png" href="<?= route("public/assets/images/logos/favicon.png") ?>"/>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <link rel="stylesheet" href="<?= route("public/css/style.css") ?>">
    <script src="<?= route("public/javascripts/function.js") ?>"></script>
</head>

<body className='snippet-body'>
    <!-- HEADER -->
    <div class="header2 bg-success-gradiant">
        <div class="">
            <!-- Header 1 code -->
            <nav class="navbar navbar-expand-lg h2-nav">
                <a class="navbar-brand" href="<?= route("homeclient") ?>">Quiz System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-menu">MENU</span>
                </button>
                <div class="collapse navbar-collapse hover-dropdown" id="header2">



                    <form class="form-inline my-2 my-lg-0 ml-auto" method="GET" action="<?= route("homeclient") ?>">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width:500px" name="search" value="<?= $_GET["search"] ?? "" ?>">
                        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="submitsearch" value="Tìm kiếm"></input>
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
                                <a class='dropdown-item' href='". route("editprofile") ."'>Chỉnh sửa tài khoản</a>";

                        if ($_SESSION["account"]["id_cv"] == 1) {
                            echo "
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='". route("homeadmin") ."'>Quản trị</a>
                                ";
                        }

                        echo "
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='". route("logoutclient") ."'>Đăng xuất</a>
                        </div>
                        </li>
                    </ul>
                    ";
                    } else {
                        echo '<ul class="navbar-nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="'. route("signinclient") .'">Login</a></li>
                                <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href="'. route("signup") .'">Sign up</a></li>
                            </ul>';
                    }
                    ?>

                </div>
            </nav>
            <!-- End Header 1 code -->
        </div>
    </div>


@yield('content' )

    <!-- FOOTER -->

    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->
    </div>
</body>

</html>