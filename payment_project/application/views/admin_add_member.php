<?php
include('admin_header.php');

?>
<br>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN SAMPLE FORMPORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-reorder"></i>Add Member Page</h4>
                <span class="tools">
                    <a href="javascript:;" class="icon-chevron-down"></a>
                    <a href="javascript:;" class="icon-remove"></a>
                </span>
            </div>
            <div class="widget-body">
                <!-- BEGIN FORM-->
                 <span style="color: #009900; text-align: center;font-size: 25px">
                    <?php
                    if (isset($success_msg) && !empty($success_msg)) {
                        echo $success_msg;
                    }
                    ?>
                </span>

                <form action="<?php echo BASE_URL; ?>admin_controller/save_member"  class="form-horizontal" method="post">
                    <div class="control-group">
                        <label class="control-label"> First name:</label>
                        <div class="controls">
                            <input  type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" class="span4"  />
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
                            <input type="text" id="surname" name="surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" class="span4" />
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
                            <input type="text" id="position" name="position" value="<?php if (isset($_POST['position'])) echo $_POST['position']; ?>" class="span4" />
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
                            <input type="text" id="telephone" name="telephone" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>" class="span4" />
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
                                <input class="span4" id="email" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
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
                            <input id="password" type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" class="span4" />
                            <span class="help-inline"></span>
                             <span class="error" style="color:red">*<?php
                                if (isset($result['password'])) {
                                    echo $result['password'];
                                }if (isset($result['password_error'])) {
                                    echo $result['password_error'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"> Organisation name:</label>
                        <div class="controls">
                            <input type="text" id="organisation_name" name="organisation_name" value="<?php if (isset($_POST['organisation_name'])) echo $_POST['organisation_name']; ?>" class="span4" />
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

                                <input class="span4" type="text" name="organisation_address" value="<?php if (isset($_POST['organisation_address'])) echo $_POST['organisation_address']; ?>" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Organisation Tel:</label>
                        <div class="controls">
                            <input type="text" name="organisation_tel" value="<?php if (isset($_POST['organisation_tel'])) echo $_POST['organisation_tel']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Organisation Email:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" type="email" name="organisation_email"  value="<?php if (isset($_POST['organisation_email'])) echo $_POST['organisation_email']; ?>" />
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
                            <input type="text" name="sec_firstname" value="<?php if (isset($_POST['sec_firstname'])) echo $_POST['sec_firstname']; ?>" class="span4" />
                            <span class="help-inline"></span>
                            <span class="error" style="color:red">*<?php
                                if (isset($result['sec_firstname'])) {
                                    echo $result['sec_firstname'];
                                }if (isset($result['sec_firstname_email'])) {
                                    echo $result['sec_firstname_email'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Surname:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <input class="span4" type="text" value="<?php if (isset($_POST['sec_surname'])) echo $_POST['sec_surname']; ?>" name="sec_surname" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Position:</label>
                        <div class="controls">
                            <input type="text" name="sec_position" value="<?php if (isset($_POST['sec_position'])) echo $_POST['sec_position']; ?>" class="span4" />

                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tel:</label>
                        <div class="controls">
                            <div class="input-icon left">

                                <input class="span4" type="text" name="sec_telephone" value="<?php if (isset($_POST['sec_telephone'])) echo $_POST['sec_telephone']; ?>"  />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email:</label>
                        <div class="controls">
                            <div class="input-icon left">
                                <i class="icon-envelope"></i>
                                <input class="span4" id="email" type="email" name="sec_email" value="<?php if (isset($_POST['sec_email'])) echo $_POST['sec_email']; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <h3>Turnover for last audited financial year (please state which year)</h3>
                        <label class="control-label">Year</label>
                        <div class="controls">
                            <select name="turnover_year">
                                <option value=" ">Year</option>
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
                            <input type="text" name="turnover_amount" value="<?php if (isset($_POST['turnover_amount'])) echo $_POST['turnover_amount']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h3>Projected budget:</h3>
                        <h5>Compulsory:  to support our campaigns programme and to assess the reach of the collective membership please supply; Postcodes of your delivery areas:</h5>
                        <label class="control-label">Turnover Budget:</label>
                        <div class="controls">
                            <input type="text" name="projected_budget" value="<?php if (isset($_POST['projected_budget'])) echo $_POST['projected_budget']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">postcode:</label>
                        <div class="controls">
                            <input type="text" name="postcode" value="<?php if (isset($_POST['postcode'])) echo $_POST['postcode']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h5>Approximately how many young people under 24 do you and your clubs/projects support each year?</h5>
                        <label class="control-label">youngpeople:</label>
                        <div class="controls">
                            <input type="text" name="youngpeople" value="<?php if (isset($_POST['youngpeople'])) echo $_POST['youngpeople']; ?>" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <h5>I confirm that my organisation has appropriate insurance and that the above information is correct to the best of my knowledge.</h5>
                        <label class="control-label">I confirm that membership is Paid </label>
                        <div class="controls">
                            <input type="checkbox" name="confirm" value="1" class="span4" />
                            <span class="help-inline"></span>
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-success submit">Submit</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>

        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>

<script>
    $(document).ready(function () {
        $(".submit").click(function (e) {
            var firstName = $("#firstname").val();
            var email = $("#email").val();
            var organisation_name = $("#organisation_name").val();
            var Surname = $("#surname").val();
            var Tel = $("#telephone").val();
            var Email = $("#email").val();
            var Password = $("#password").val();
       //     alert(firstName );
//
            if (firstName == '' || email == '' || organisation_name == '' || Surname == '' || Tel == '' || Email == '' || Password == '') {
                 alert('Please Give User Name, Email,organization name, Surname, Tel,  email and Password')
            }
            //   if (firstName == '') {
            //       alert('Please Give User Name');
            //   }
        });
    });
</script>

<?php include('admin_footer.php'); ?>