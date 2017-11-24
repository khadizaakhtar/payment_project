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
                    <h3 class="content_title">Please Select</h3>
                    <div class="row">                     
                        <form action="<?php echo BASE_URL; ?>user_controller/update_membership_level" method="post">
                            <div class="form-group full-width">
                                <input type="hidden" name="userid" id="firstName" value="<?php echo $userid;?>" class="form-control"/>
                                <label  class="label-1 rs_label">Membership level</label>
                                <div class="select">
                                    <select name="membership_level" class="selectpicker" data-style="btn-select">
                                        <option value="premium_amount">Premium</option>
                                        <option value="associate_amount">Associate</option>
                                    </select>
                                </div>
                            </div>
                            <div id="publishbtn">
                                <button type="submit" class="publish2" id="publish"><i class="fa fa-floppy-o"></i>publish</button>
                                <br style="clear:both" />
                            </div>
                        </form>
                    </div>
                    <br style="clear:both"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('project_footer.php'); ?>