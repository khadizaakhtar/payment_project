<style>
    .error_email{
    text-align:center;
    color:red;
    }
    .error_email_organization{
         text-align:center;
         color:red;
    }
</style>

<?php include('project_header.php'); ?>

<div id="main" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="menu-list">
                    <li class="home"><a href="#">Home</a></li>
                    <li class="active">Register Form</li>
                </ol>
            </div>
        </div>
         <?php 
        foreach($result as $v_result){
            
        }
        ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <h3 class="content-title">Register Form</h3>
                    <form action="<?php echo BASE_URL; ?>user_controller/update_renew" method="post">
                      
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">First name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="firstname" id="firstName" class="form-control" value="<?php echo $v_result['firstname'] ?>"/>
                                <input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $v_result['userid'] ?>"/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Surname:</label>
                                <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $v_result['surname'] ?>" />
                            </div>	
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Position:</label>
                                <input type="text" name="position" id="firstName" class="form-control" value="<?php echo $v_result['position'] ?>"/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Tel:</label>
                                <input type="text" name="telephone" id="firstName" class="form-control" value="<?php echo $v_result['telephone'] ?>"/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $v_result['email'] ?>"/>
                     <div style="color:red; text-align: center">
                             <?php
                    if (isset($msg) && !empty($msg)) {                       
                        echo $msg;
                      }
                    ?>
                    </div>
                                <div class="error_email">
                                 </div>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">password:</label>
                                <input type="text" name="password" id="firstName" class="form-control" placeholder="Change Your Password? Please Type"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Organization name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="organisation_name" id="organisation_name" class="form-control" value="<?php echo $v_result['organisation_name'] ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Office Address:</label>
                                <input type="text" name="organisation_address" id="firstName" class="form-control" value="<?php echo $v_result['organisation_address'] ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Tel:</label>
                                <input type="text" name="organisation_tel" id="firstName" class="form-control" value="<?php echo $v_result['organisation_tel'] ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="email" name="organisation_email" id="organisation_email" class="form-control" value="<?php echo $v_result['organisation_email'] ?>"/>
                                <div class="error_email_organization">
                                 </div>
                            </div>                            
                            
                        
                            <div class="form-group full-width">
                                <h3>Secondary Contact:</h3>              
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">First name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="sec_firstname" id="sec_firstname" class="form-control" value="<?php echo $v_result['sec_firstname'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Surname:</label>
                                <input type="text" name="sec_surname" id="sec_surname" class="form-control" value="<?php echo $v_result['sec_surname'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Position:</label>
                                <input type="text" name="sec_position" id="sec_position" class="form-control" value="<?php echo $v_result['sec_position'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Tel:</label>
                                <input type="text" name="sec_telephone" id="sec_telephone" class="form-control" value="<?php echo $v_result['sec_telephone'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="sec_email" id="sec_email" class="form-control" value="<?php echo $v_result['sec_email'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <h6>Turnover for last audited financial year (please state which year):</h6>              
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Turnover Year:</label>
                                <input type="text" name="turnover_year" id="firstName" class="form-control" value="<?php echo $v_result['turnover_year'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Turnover Amount:</label>
                                <input type="text" name="turnover_amount" id="firstName" class="form-control" value="<?php echo $v_result['turnover_amount'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Project Budget:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="projected_budget" id="projected_budget" class="form-control"  value="<?php echo $v_result['projected_budget'] ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <h6 class="extra_heading">Compulsory: to support our campaigns programme and to assess the reach of the collective membership please supply; Postcodes of your delivery areas:</h6>              
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">PostCode:</label>
                                <input type="text" name="postcode" id="firstName" class="form-control" value="<?php echo $v_result['postcode'] ?>"/>
                            </div>
<div class="form-group full-width">
                                <h6 class="extra_heading"> Approximately how many young people under 24 do you and your clubs/projects support each year?</h6>              
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Young People year:</label>
                                <input type="text" name="youngpeople" id="firstName" class="form-control" value="<?php echo $v_result['youngpeople'] ?>"/></p>
                            </div>

                               <div class="form-group full-width">
                                <label  class="label-1">Membership level</label>
                                <div class="select">
                                    <select name="membership_level" class="selectpicker" data-style="btn-select">
                                        <option value="premium_amount" <?php if (($v_result['membership_level'])=='premium_amount') echo 'selected'; ?>>Premium</option>
                                        <option value="associate_amount" <?php if (($v_result['membership_level'])=='associate_amount') echo 'selected'; ?>>Associate</option>
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group full-width">
                                <input type="checkbox" name="confirmation_check" value="yes" class="confirmation_check" id="confirmation_check"/> I confirm that my organisation has appropriate insurance and that the above information is correct to the best of my knowledge.
                            </div>
                            <div>
                                <button type="submit" class="publish2" id="publish"><i class="fa fa-floppy-o"></i>publish</button>
                                <br style="clear:both" />
                            </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {     
        $(".publish2").click(function (e) {
            var baseurl = '<?php echo BASE_URL; ?>';
            var url= baseurl + "user_controller/check_unique_email_for_update/";
            var firstName = $("#firstName").val();
            var email = $("#email").val();
            var userid = $("#userid").val();
            var organisation_name=$("#organisation_name").val();
            var organisation_email=$("#organisation_email").val();
            var sec_firstname = $("#sec_firstname").val();
            var sec_email = $("#sec_email").val();
            var postcode = $("#postcode").val();
            var projected_budget = $("#projected_budget").val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var emailvalidation = document.getElementById('email');
            if(!email==''){
            if (!filter.test(emailvalidation.value)) {
                $( ".error_email" ).html( "<span>Please provide a valid email address</span>");
                email.focus;
                return false;
               } 
            }
            
      if ((firstName == '' || email == '' || organisation_name=='' || organisation_email==''  || sec_firstname == '' || sec_email == '' || projected_budget=='' || postcode=='') || (!$('#confirmation_check').is(':checked'))) {
      
                if(firstName == '' || email == '' || organisation_name=='' || organisation_email==''  || sec_firstname == '' || sec_email == '' || projected_budget=='' || postcode==''){
      
          alert('Please Give User Name, Email,Organization Name,organization Email,Name, Email,Project budget And Postcode');
                return false;
                }
                
          if ($('#confirmation_check').prop('checked', false)) {
                alert('please check confirmation');
                return false; 
                  }
            }
                
        });    

    });
</script>

<?php include('project_footer.php'); ?>