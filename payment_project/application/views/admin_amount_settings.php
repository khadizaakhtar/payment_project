<?php
include('admin_header.php');

//echo  $Cyear.'<br>',$prev;die();
?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>  Payment Setting Page</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php
                foreach ($result as $key) {
                    //     print_r($result);
//                        //  getVal($settings)
                    //         die();
                }
                ?>
                <!-- BEGIN FORM-->
                <form name="admin_amount_settings" action="<?php echo BASE_URL; ?>admin_controller/update_settings" class="form-horizontal" method="post">

                    <div class="control-group">
                        <label class="control-label">Associate Amount</label>
                        <div class="controls">
                            <input type="text" name="associate_amount" value="<?php echo $result['associate_amount']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Premium Amount</label>
                        <div class="controls">
                            <input type="text" name="premium_amount" value="<?php echo $result['premium_amount']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Stripe test secret_key</label>
                        <div class="controls">
                            <input type="text" name="stripe_test_secret_key" value="<?php echo $result['stripe_test_secret_key']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stripe test publishable key</label>
                        <div class="controls">
                            <input type="text" name="stripe_test_publishable_key" value="<?php echo $result['stripe_test_publishable_key']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stripe live secret key</label>
                        <div class="controls">
                            <input type="text" name="stripe_live_secret_key" value="<?php echo $result['stripe_live_secret_key']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Stripe live publishable key</label>
                        <div class="controls">
                            <input type="text" name="stripe_live_publishable_key" value="<?php echo $result['stripe_live_publishable_key']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Stripe mode</label>
                        <div class="controls">
                            <select name="stripe_mode" class="form-control" >
                                <option selected>----select Owner ----</option>
                                <option value="test">test</option>
                                <option value="live">live</option>
                            </select>
                        </div>
                    </div>
                   

                    <div class="control-group">
                        <label class="control-label">Email From Address</label>
                        <div class="controls">
                            <input type="text" name="email_from" value="<?php echo $result['email_from']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email From Name</label>
                        <div class="controls">
                            <input type="text" name="email_from_name" value="<?php echo $result['email_from_name']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Update Settings</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
                <script>
                    document.forms['admin_amount_settings'].elements['stripe_mode'].value = "<?php echo $result['stripe_mode']; ?>";
                </script>
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<?php include('admin_footer.php'); ?>