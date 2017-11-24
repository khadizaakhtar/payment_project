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
            <form action="<?php echo BASE_URL; ?>admin_login_controller/update_forgot_password_check" method="post">
                <div class="metro single-size red">
                    <div class="locked">
<!--                        <i class="icon-lock"></i>
                        <span>Login</span>-->
                    </div>
                </div>
                <div class="metro double-size green">

                    <div class="input-append lock-input">
                        <input type="password" name="password" class="" placeholder="Password">
                    </div>

                </div>
                <div class="metro double-size yellow">

                    <div class="input-append lock-input">
                        <input type="password" name="retype_password" class="" placeholder="Retype password">
                    </div>

                </div>
                <div class="metro single-size terques login">

                    <button type="submit" class="btn login-btn">
                        Reset Password
                        <i class=" icon-long-arrow-right"></i>
                    </button>

                </div>
            </form>
            <div class="login-footer">
                <div class="remember-hint pull-left">
                    <input type="checkbox"> Remember Me
                </div>
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="<?php echo BASE_URL; ?>admin_controller/forgot_password">Forgot Password?</a>
                </div>
            </div>
        </div>

    </body>
    <!-- END BODY -->
</html>