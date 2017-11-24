<style>
    #publish{
        margin-right: 715px !important;
    }
</style>
<?php include('project_header.php'); ?>
<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="menu-list">
                    <li class="home"><a href="index.html">Home</a></li>
                    <li class="active">SELECT</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                     <div style="color:green; text-align: center; padding-bottom:10px;">
                    <?php
                    if (isset($_SESSION['msg2']) && $_SESSION['msg2'] != '') {                       
                        echo $_SESSION['msg2'];
                         unset($_SESSION['msg2']);
                      }
                    ?>
                    </div>
                     <div class="row">
                             <h3 align="center"><a href="<?php echo BASE_URL; ?>user_controller/user_login">Click! Here to  Login</a></h3> 
                            </div> 
                    </div>
                    <br style="clear:both"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('project_footer.php'); ?>