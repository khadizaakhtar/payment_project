<?php include('login_header.php'); ?>
<body id="login">
    <div class="login-logo">
        <!--<a href="index.html"><img src="<?php echo BASE_URL; ?>/static/images/logo.png" alt=""/></a>-->
    </div>
    <h2 class="form-heading">login</h2>
    <div class="app-cam" id="app-cam-login">
        <div id="form-box">
            <h4 class="rs_header">Reset Your Password</h4>  
                <div style="color:green; text-align: center">
                            <?php
                             if (isset($msg) && !empty($msg)) {                       
                                   echo $msg;
                                 }
                                ?>
                               </div>
                               <div style="color:red; text-align: center; padding-bottom:10px;">
                               <?php
                               if (isset($_SESSION['msg3']) && $_SESSION['msg3'] != '') {                       
                                   echo $_SESSION['msg3'];
                                   unset($_SESSION['msg3']);
                                  }
                                ?>
                                </div>
            <form action="<?php echo BASE_URL; ?>user_controller/update_forgot_password" method="post">
                <div class="form-group user">
                    <input type="password" name="password"  id="password"  class="form-control text" placeholder="password"/>
                     <input type="hidden" name="code" value="<?php echo $code; ?>" class="form-control" placeholder=""/>
                </div>
                <div class="form-group user">
                    <input type="password" name="retype_password" id="retype_password"  class="form-control text" placeholder="retype password"/>
                </div>
                <div class="submit"><input class="send_email"type="submit" value="Send"></div>
            </form>
        </div>
    </div>

    <div class="copy_layout login">       
    </div>
</body>
<?php include('login_footer.php'); ?>































