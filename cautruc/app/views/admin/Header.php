<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz System Admin</title>
    <link rel="shortcut icon" type="image/png" href="./public/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="./public/assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "./public/js/function.js"></script>
</head>

<body>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <!-- MENU THANH BÊN -->
        <!-- LOGO -->
        <!-- style="background-color:#222;" -->
        <aside class="left-sidebar" >
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="?url=/" class="text-nowrap logo-img">
                        <img src="./public/assets/images/logos/dark-logo.svg" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>

                <!-- MENU -->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Trang chủ</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=adminhomepage" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Quản lý Quiz</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=listquiz" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Danh sách Quiz</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <span>
                                    <i style="font-size:24px" class="fa fa-question-circle"></i>
                                </span>
                                <span class="hide-menu">Thêm Quiz</span>
                            </a>
                        </li>


                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Quản lý tài khoản</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=listaccount" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Danh sách tài khoản</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=addaccount" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Thêm tài khoản</span>
                            </a>
                        </li>


                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tài khoản cá nhân</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=editaccountadmin&id_tk=<?= $_SESSION["account"]["id_tk"] ?>" aria-expanded="false">
                                <span>
                                    <i style="font-size:24px" class="fa fa-address-book-o"></i>
                                </span>
                                <span class="hide-menu">Chỉnh sửa tài khoản</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="?url=logoutadmin" aria-expanded="false">
                                <span>
                                    <i style="font-size:24px" class="fa fa-sign-out"></i>
                                </span>
                                <span class="hide-menu">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </nav>



                
            </div>
        </aside>

