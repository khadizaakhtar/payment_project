<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo BASE_URL; ?>static/admin/css/style-default.css" rel="stylesheet" id="style_color" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock">
        <div class="lock-header">
            <!-- BEGIN LOGO -->
            <a class="center" id="logo" href="index.html">
                <img class="center" alt="logo" src="<?php echo BASE_URL; ?>static/admin/img/logo.png">
            </a>
            <!-- END LOGO -->
        </div>


        <div class="login-wrap">
            <div style="color:red; text-align: center; padding-bottom:10px;">
                <?php
                if (isset($_SESSION['exc']) && $_SESSION['exc'] != '') {
                    echo $_SESSION['exc'];
                    unset($_SESSION['exc']);
                }
                ?>
            </div>
            <div style="color:#ffffff; text-align: center; padding-bottom:10px;">
                <?php
                if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
            </div>
            <form action="<?php echo BASE_URL; ?>admin_login_controller/check_email_address" method="post">
                <div class="metro single-size terques">
                    <div class="locked">


                    </div>
                </div>
                <div class="metro single-size red">
                    <div class="locked">


                    </div>
                </div>
                <div class="metro double-size green">

                    <div class="input-append lock-input">
                        <input type="email" id="email" name="email" class="" placeholder="Email">
                    </div>

                </div>
                <div class="metro single-size red">
                    <div class="locked">


                    </div>
                </div>

                <div class="metro single-size terques login">

                    <button type="submit" class="btn login-btn">
                        Check Email
                        <i class="icon-long-arrow-right"></i>
                    </button>

                </div>
            </form>
            <div class="login-footer">

                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="<?php echo BASE_URL; ?>">Back</a>
                </div>
            </div>
        </div>

    </body>
    <!-- END BODY -->
</html>
