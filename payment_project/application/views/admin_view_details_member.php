<?php include('admin_header.php');
?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Edit Member Page</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <?php
          // print_r($data);die();
               
                  // print_r($value['userid']);die();
               
                ?>
                <!-- BEGIN FORM-->
                <form name="admin_view_details_member" action="<?php echo BASE_URL; ?>admin_controller/view_details_member/<?php echo $data['userid']; ?>" class="form-horizontal" method="post">
                    <div class="control-group">
                        <label class="control-label"> First name:</label>
                        <div class="controls">
                            <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>" class="span4" />
                            <input type="hidden" name="userid" value="<?php echo  $data['userid']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['firstname'])) {
                                    echo $result['firstname'];
                                }if (isset($result['firstname_error'])) {
                                    echo $result['firstname_error'];
                                }
                                ?>
                            </span>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> surname:</label>
                        <div class="controls">
                            <input type="text" name="surname" value="<?php echo  $data['surname']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['surname'])) {
                                    echo $result['surname'];
                                }if (isset($result['surname_error'])) {
                                    echo $result['surname_error'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Position:</label>
                        <div class="controls">
                            <input type="text" name="position" value="<?php echo  $data['position']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['position'])) {
                                    echo $result['position'];
                                }if (isset($result['position_error'])) {
                                    echo $result['position_error'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Tel:</label>
                        <div class="controls">
                            <input type="text" name="telephone" value="<?php echo  $data['telephone']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['telephone'])) {
                                    echo $result['telephone'];
                                }if (isset($result['telephone_error'])) {
                                    echo $result['telephone_error'];
                                }
                                ?>
                            </span>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Email:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" type="email" name="email" value="<?php echo  $data['email']; ?>" />
                                <span class="error" style="color:red">*<?php
                                    if (isset($result2['email'])) {
                                        echo $result2['email'];
                                    }if (isset($result2['email_error'])) {
                                        echo $result2['email_error'];
                                    }
                                    ?>
                                </span>
                                <span style="color: #ff0000; text-align: center">
                                    <?php
                                    if (isset($duplicate_error) && !empty($duplicate_error)) {
                                        echo $duplicate_error;
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> password:</label>
                        <div class="controls">
                            <?php
                            //  if($result[0]['password']);die();
                            ?>
                            <input id="password" type="text" name="password" value="<?php
                            if (!empty( $data['password']));$data['password'];
                            ?>" class="span4" />
                            <span class="error" style="color:red">*</span>

                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"> Organisation name:</label>
                        <div class="controls">
                            <input type="text" name="organisation_name" value="<?php echo  $data['organisation_name']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['organisation_name'])) {
                                    echo $result['organisation_name'];
                                }if (isset($result['organisation_name_error'])) {
                                    echo $result['organisation_name_error'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Office Address:</label>
                        <div class="controls">
                            <div class="input-icon left">

                                <input class="span4" type="text" name="organisation_address" value="<?php echo  $data['organisation_address']; ?>" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Organisation Tel:</label>
                        <div class="controls">
                            <input type="text" name="organisation_tel" value="<?php echo  $data['organisation_tel']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Organisation Email:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" type="email" name="organisation_email" required value="<?php echo  $data['organisation_email']; ?>" />
                                <span class="error" style="color:red">*<?php
                                    if (isset($result['organisation_email'])) {
                                        echo $result['organisation_email'];
                                    }if (isset($result['organisation_email'])) {
                                        echo $result['organisation_email'];
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3 align="center">Secondary Contact</h3>
                    <div class="control-group">
                        <label class="control-label">First name:</label>
                        <div class="controls">
                            <input type="text" name="sec_firstname" value="<?php echo  $data['sec_firstname']; ?>" class="span4" />
                            <span class="help-inline"></span>

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Surname:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <input class="span4" type="text" value="<?php echo  $data['sec_surname']; ?>" name="sec_surname" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Position:</label>
                        <div class="controls">
                            <input type="text" name="sec_position" value="<?php echo  $data['sec_position']; ?>" class="span4" />

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tel:</label>
                        <div class="controls">
                            <div class="input-icon left">

                                <input class="span4" type="text" name="sec_telephone" value="<?php echo  $data['sec_telephone']; ?>"  />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" type="email" name="sec_email" value="<?php echo  $data['sec_email']; ?>" />
                            </div>
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <h3>Turnover for last audited financial year (please state which year)</h3>
                        <label class="control-label">Year</label>
                        <div class="controls">
                            <select name="turnover_year">
                                <option value="0">Year</option>
                                <?php
                                $Cyear = date("Y");
                                $prev = strtotime(date('d-m-Y') . ' -5 year');
                                $Pyear = date('Y', $prev);
                                $x = $Cyear - $Pyear;
                                for ($i = 0; $i <= $x; $i++) {
                                    $v = $Pyear + $i;
                                    ?>
                                    <option value="<?php echo $v ?>"><?php echo $v; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Turnover Amount:</label>
                        <div class="controls">
                            <input type="text" name="turnover_amount" value="<?php echo  $data['turnover_amount']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h3>Projected budget:</h3>

                        <label class="control-label">Turnover Budget:</label>
                        <div class="controls">
                            <input type="text" name="projected_budget" value="<?php echo  $data['projected_budget']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h5>Compulsory:  to support our campaigns programme and to assess the reach of the collective membership please supply; Postcodes of your delivery areas:</h5>
                        <label class="control-label">postcode:</label>
                        <div class="controls">
                            <input type="text" name="postcode" value="<?php echo  $data['postcode']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h5>Approximately how many young people under 24 do you and your clubs/projects support each year?</h5>
                        <label class="control-label">youngpeople:</label>
                        <div class="controls">
                            <input type="text" name="youngpeople" value="<?php echo  $data['youngpeople']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>  
                   

                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<script>
    document.forms['admin_view_details_member'].elements['turnover_year'].value = "<?php echo  $data['turnover_year']; ?>";
</script>
<?php include('admin_footer.php'); ?>
