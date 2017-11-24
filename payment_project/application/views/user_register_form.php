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
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <h3 class="content-title">Register Form</h3>
                    <form action="<?php echo BASE_URL; ?>user_controller/register" method="post">
                        <div class="step1">
                            <div class="form-group full-width">
                                <label for="first_name" class="label-1">First Name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="firstname" id="firstName" class="form-control" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" placeholder=""/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="surname" class="label-1">Surname:</label>
                                <input type="text" name="surname" id="surname" class="form-control" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" placeholder=""/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="position" class="label-1">Position:</label>
                                <input type="text" name="position" id="position" class="form-control" value="<?php if (isset($_POST['position'])) echo $_POST['position']; ?>"/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="telephone" class="label-1">Tel:</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>"/>
                            </div>	
                            <div class="form-group full-width">
                                <label for="email" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
                                <div class="error_email">
                                 </div>
                            </div>
                            <div class="form-group full-width">
                                <label for="password" class="label-1" >Password:<span class="error" style="color:red">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="organisation_name" class="label-1">Organization Name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="organisation_name" id="organisation_name" class="form-control" value="<?php if (isset($_POST['organisation_name'])) echo $_POST['organisation_name']; ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="organisation_address" class="label-1">Office Address:</label>
                                <input type="text" name="organisation_address" id="organisation_address" class="form-control" value="<?php if (isset($_POST['organisation_address'])) echo $_POST['organisation_address']; ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="organisation_tel" class="label-1">Tel:</label>
                                <input type="text" name="organisation_tel" id="organisation_tel" class="form-control" value="<?php if (isset($_POST['organisation_tel'])) echo $_POST['organisation_tel']; ?>"/>
                            </div> 
                            <div class="form-group full-width">
                                <label for="organisation_email" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="email" name="organisation_email" id="organisation_email" class="form-control" value="<?php if (isset($_POST['organisation_email'])) echo $_POST['organisation_email']; ?>"/>
                                <div class="error_email_organization">
                                 </div>
                            </div> 
                            <div class="form-group full-width">
                                <button type="button" class="publish" id="publish"><i class="fa fa-floppy-o"></i>Next</button>
                                <br style="clear:both" />
                            </div>
                        </div>
                        <div class="step2">
                            <div class="form-group full-width">
                                <h3>Secondary Contact:</h3>              
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">First name:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="sec_firstname" id="sec_firstname" class="form-control" value="<?php if (isset($_POST['sec_firstname'])) echo $_POST['sec_firstname']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Surname:</label>
                                <input type="text" name="sec_surname" id="sec_surname" class="form-control" value="<?php if (isset($_POST['sec_surname'])) echo $_POST['sec_surname']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Position:</label>
                                <input type="text" name="sec_position" id="sec_position" class="form-control" value="<?php if (isset($_POST['sec_position'])) echo $_POST['sec_position']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Tel:</label>
                                <input type="text" name="sec_telephone" id="sec_telephone" class="form-control" value="<?php if (isset($_POST['sec_telephone'])) echo $_POST['sec_telephone']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Email:<span class="error" style="color:red">*</span></label>
                                <input type="email" name="sec_email" id="sec_email" class="form-control" value="<?php if (isset($_POST['sec_email'])) echo $_POST['sec_email']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <h6 class="extra_heading">Turnover for last audited financial year (please state which year):</h6>              
                            </div> 
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Turnover Year:</label>
                                <input type="hidden" id="turnover_year" value="0">
                                <div class="select">
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
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Turnover Amount:</label>
                                <input type="text" name="turnover_amount" id="firstName" class="form-control" value="<?php if (isset($_POST['turnover_amount'])) echo $_POST['turnover_amount']; ?>"/>
                            </div>
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Projected budget:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="projected_budget" id="projected_budget" class="form-control" value="<?php if (isset($_POST['projected_budget'])) echo $_POST['projected_budget']; ?>"/>
                            </div>
                              <div class="form-group full-width">
                                <h6 class="extra_heading">Compulsory: to support our campaigns programme and to assess the reach of the collective membership please supply; Postcodes of your delivery areas:</h6>              
                            </div>  
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">PostCode:<span class="error" style="color:red">*</span></label>
                                <input type="text" name="postcode" id="postcode" class="form-control" value="<?php if (isset($_POST['postcode'])) echo $_POST['postcode']; ?>"/>
                            </div>

                             <div class="form-group full-width">
                                <h6 class="extra_heading"> Approximately how many young people under 24 do you and your clubs/projects support each year?</h6>              
                            </div>
                             
                            <div class="form-group full-width">
                                <label for="tenantName" class="label-1">Young people year:</label>
                                <input type="text" name="youngpeople" class="form-control"/></p>
                            </div>
                            <div class="form-group full-width">
                                <input type="checkbox" name="confirmation_check" value="yes" class="confirmation_check" id="confirmation_check" class="extra_heading"/> I confirm that my organisation has appropriate insurance and that the above information is correct to the best of my knowledge.
                            </div>
                            <div>
                                <button type="submit" class="publish2" id="publish"><i class="fa fa-floppy-o"></i>publish</button>
                                <br style="clear:both" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.step2').hide();
        $(".publish").click(function (e) {
            var baseurl = '<?php echo BASE_URL; ?>';
            var url= baseurl + "user_controller/check_unique_email/";
            var firstName = $("#firstName").val();
            var email = $("#email").val();
            var password= $("#password").val();
            var organisation_name=$("#organisation_name").val();
            var organisation_email=$("#organisation_email").val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var emailvalidation = document.getElementById('email');
            if(!email==''){
            if (!filter.test(emailvalidation.value)) {
                $( ".error_email" ).append( "<span>Please provide a valid email address</span>");
                email.focus;
                return false;
            } 
            }
console.log(firstName + ' '+email +' '+password+' '+organisation_name);
            if (firstName == '' || email == '' || password=='' || organisation_name=='' || organisation_email=='' ) {
                alert('Please Give User Name, Email,Password,Organization Name And organization Email');
            }
            else {

            
             $.ajax({
             method:"POST",
             url:url,
             dataType:'json',
             data: { email: email },
             success:function(data) {

             if(data.success==0){            
                 
             $( ".error_email" ).html(data.msg);     
                    }
                    else{
              $('.step2').show();
               $('.step1').hide();   
                    }
              }
             });          
            }
        });

        $(".publish2").click(function (e) {
            var sec_firstname = $("#sec_firstname").val();
            var sec_email = $("#sec_email").val();
            var postcode = $("#postcode").val();
            var projected_budget = $("#projected_budget").val();
            if((sec_firstname == '' || sec_email == '' || projected_budget=='' || postcode=='' ) || (!$('#confirmation_check').is(':checked'))){
            if (sec_firstname == '' || sec_email == '' || postcode=='') {
                alert('Please Give Name, Email,Project budget And Postcode')
                return false;
            }
            if ($('#confirmation_check').prop('checked', false)) {
                alert('please check confirmation');
                return false; 
            }
        }else{
            
            return true;
        }

        });

    });
</script>

  
<?php include('project_footer.php'); ?>