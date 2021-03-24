<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Controlo de consumo de combustiveis</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="../assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../assets/css/plugins/plugins.css">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="../assets/css/helper.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="skin-dark">



    

        <!-- Header Section Start -->
        <div class="header-section">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">

                    <!-- Header Logo (Header Left) Start -->
                    <div class="header-logo col-auto">
                        <a href="../index.html">
                            <img src="../assets/images/logo/logo.png" alt="" style="width:64px ; height:64px;" >
                            <img src="../assets/images/logo/logo-light.png" class="logo-light" alt=""
                            style="width:64px ; height:64px;">
                        </a>
                    </div><!-- Header Logo (Header Left) End -->

                    <!-- Header Right Start -->
                    <div class="header-right flex-grow-1 col-auto">
                        <div class="row justify-content-between align-items-center">

                            <!-- Side Header Toggle & Search Start -->
                            <div class="col-auto">
                                <div class="row align-items-center">

                                    <!--Side Header Toggle-->
                                    <div class="col-auto"><button class="side-header-toggle"><i class="zmdi zmdi-menu"></i></button></div>

                                    <!--Header Search-->
                                    <div class="col-auto">

                                        <div class="header-search">

                                            <button class="header-search-open d-block d-xl-none"><i class="zmdi zmdi-search"></i></button>

                                            <div class="header-search-form">
                                                <form action="#">
                                                    <input type="text" placeholder="Search Here">
                                                    <button><i class="zmdi zmdi-search"></i></button>
                                                </form>
                                                <button class="header-search-close d-block d-xl-none"><i class="zmdi zmdi-close"></i></button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div><!-- Side Header Toggle & Search End -->

                            <!-- Header Notifications Area Start -->
                            <div class="col-auto">

                                <ul class="header-notification-area">




                                    <!--User-->
                                    <li class="adomx-dropdown col-auto">
                                        <a class="toggle" href="#">
                                            <span class="user">
                                        <span class="avatar">
                                            <img src="../assets/images/avatar/avatar-1.png" alt="">
                                            <span class="status"></span>
                                            </span>
                                            <span class="name"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                                            </span>
                                        </a>

                                        <!-- Dropdown -->
                                        <div class="adomx-dropdown-menu dropdown-menu-user">
                                            <div class="head">
                                                <h5 class="name"><?php echo htmlspecialchars($_SESSION["username"]); ?></h5>
                                                
                                            </div>
                                            <div class="body">
                                                <ul>
                                                    <li><a href="../user/reset-password.php"><i class="zmdi zmdi-account"></i>Change Password</a></li>
                                                    
                                                    
                                                </ul>
                                                <ul>
                                                    
                                                    <li><a href="../user/logout.php"><i class="zmdi zmdi-lock-open"></i>Sing out</a></li>
                                                </ul>

                                            </div>
                                        </div>

                                    </li>

                                </ul>

                            </div><!-- Header Notifications Area End -->

                        </div>
                    </div><!-- Header Right End -->

                </div>
            </div>
        </div><!-- Header Section End -->
        <!-- Side Header Start -->
        <div class="side-header show">
            <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
            <!-- Side Header Inner Start -->
            <div class="side-header-inner custom-scroll">

                <nav class="side-header-menu" id="side-header-menu">
                    <ul>
                        <li><a href="../pages/welcome.php"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="../maquinas/maquinas.php"><i class="fa fa-truck"></i> <span>Maquinas</span></a></li>
                        <li><a href="../abastecimentos/abastecimentos.php"><i class="ti-package"></i> <span>Abastecimentos</span></a>

                        </li>
                        <li><a href="../obras/obras.php"><i class="ti-crown"></i> <span>Obras</span></a>

                        </li>
                        <li><a href="../combustiveis/combustiveis.php"><i class="ti-stamp"></i> <span>Combustiveis</span></a>
                        </li>
                        <li><a href="../users/user.php"><i class="fa fa-users"></i> <span>Users</span></a>

                        </li>
                    </ul>
                </nav>

            </div><!-- Side Header Inner End -->
        </div><!-- Side Header End -->
        





