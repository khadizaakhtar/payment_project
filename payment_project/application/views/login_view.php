<?php include('login_header.php'); ?>
<body id="login">
    <div class="login-logo">
        <!--<a href="index.html"><img src="<?php echo BASE_URL; ?>/static/images/logo.png" alt=""/></a>-->
    </div>
    <h2 class="form-heading">login</h2>
    <div class="app-cam" id="app-cam-login">
        <div id="form-box">
            <strong>Please login</strong>
            <form action="<?php echo BASE_URL; ?>user_controller/check_login" method="post">
                <div style="color:red; padding-bottom:15px;">
                    <?php
                    if (isset($login_error_message) && !empty($login_error_message)) {                       
                        echo $login_error_message;
                      }
                    ?>
                    </div>
                <div class="form-group user">
                    <input type="email" name="email" id="email"  class="form-control text" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required />
                </div>
                <div class="form-group password">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" required>
                </div>
                <div class="submit"><input type="submit" value="Login"></div>
            </form>
        </div>
        <div class="center-view"><span><i class="fa fa-user-plus"></i></span>Forgot Your Password? <a href="<?php echo BASE_URL; ?>/user_controller/view_email" style="text-align: center">Click Here</a></div>
    </div>

    <div class="copy_layout login">       
    </div>
</body>
<?php include('login_footer.php'); ?>