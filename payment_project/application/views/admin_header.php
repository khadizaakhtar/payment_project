<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Metro Lab</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="Mosaddek" name="author" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style-default.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo BASE_URL; ?>static/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>static/admin/sweetalert/sweetalert.css" />
         <script src="<?php echo BASE_URL; ?>static/admin/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo BASE_URL; ?>static/admin/sweetalert/sweetalert.min.js"></script>
        <script src="<?php echo BASE_URL; ?>static/admin/sweetalert/sweetalert-dev.js"></script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <p style="color: #ffffff">Admin Panel</p>
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">

                        </ul>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >  
                            <!-- BEGIN USER LOGIN DROPDOWN -->


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo BASE_URL; ?>static/admin/img/avatar1_small.jpg" alt="">
                                    <span class="username"><?php echo $_SESSION['admin_username'] ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="<?php echo BASE_URL; ?>admin_login_controller/profile"><i class="icon-user"></i>Edit Profile</a></li>


                                    <li><a href="<?php echo BASE_URL; ?>admin_login_controller/logout"><i class="icon-key"></i> Log Out</a></li>

                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <?php include('admin_sidebar.php'); ?>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->  
            <div id="main-content">
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid">
                    <!-- BEGIN PAGE HEADER-->   