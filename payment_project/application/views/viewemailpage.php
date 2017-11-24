<?php include('login_header.php'); ?>
<body id="login">
    <div class="login-logo">
        <!--<a href="index.html"><img src="<?php echo BASE_URL; ?>/static/images/logo.png" alt=""/></a>-->
    </div>
    <h2 class="form-heading">login</h2>
    <div class="app-cam" id="app-cam-login">
        <div id="form-box">
            <h4 class="rs_header">Forgot Your Password?</h4>
             <h6 class="rs_header2">Enter Your Email Address to Reset Your Password.</h6>  
               <div style="color:red; text-align: center; padding-bottom:10px;">
                    <?php
                     if (isset($_SESSION['exc']) && $_SESSION['exc'] != '') {                       
                        echo $_SESSION['exc'];
                        unset($_SESSION['exc']);
                      }
                    ?>
                    </div>
                     <div style="color:green; text-align: center; padding-bottom:10px;">
                    <?php
                    if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {                       
                        echo $_SESSION['msg'];
                         unset($_SESSION['msg']);
                      }
                    ?>
                    </div>
            <form action="<?php echo BASE_URL; ?>user_controller/check_email_address" method="post">
                <div class="form-group user">
                    <input type="email" name="email" id="email"  class="form-control text"/>
                </div>
                <div class="submit"><input class="send_email"type="submit" value="Send Email"></div>
            </form>
        </div>
    </div>

    <div class="copy_layout login">       
    </div>
</body>
<?php include('login_footer.php'); ?>































