<?php include('admin_header.php'); ?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i> Sample Form </h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM-->
                <?php
                foreach ($result as $v_info) {
                    //   echo '<pre>';
                    //    print_r($result);
                }
                ?>
                <form action="<?php echo BASE_URL; ?>admin_login_controller/update_admin_profile/<?php echo $result[0]['id']; ?>" method="post" class="form-horizontal">
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="username" class="span4" value="<?php echo $result[0]['username']; ?>" />
                            <input type="hidden" name="id" class="span4" value="<?php echo $_SESSION['admin_id']; ?>  " />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" type="email" name="email" placeholder="Email Address" value="<?php echo $result[0]['email']; ?>" />

                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" class="span4" value="" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<?php include('admin_footer.php'); ?>