<?php include('project_header.php'); ?>
   <?php
if(isset($result) && !empty($result)){
  $stripemode=$result['stripe_mode'];
  $testapi=$result['stripe_test_publishable_key'];
  $apilive=$result['stripe_live_publishable_key'];
       }
   ?>

        <script type="text/javascript">



<?php 
                 if($stripemode == 'test'){
            echo "Stripe.setPublishableKey('$testapi');\n";        
                   }
               else{
               echo "Stripe.setPublishableKey('$apilive');\n";   
                    }
?>
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    form$.get(0).submit();
                }
            }
            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");
                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    return false; // submit from callback
                });
            });
        </script>

<style>
    #publish{
        margin-right: 715px !important;
    }
</style>

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
                    <h3 class="payment_title">Payment Information</h3>
                     <h3 class="title2">Chosen Membership Type: <?php if($membership_level=='premium_amount'){ echo 'Premium';} else{ echo 'Associate'; } ?> </h3>
                     <h3 class="title2">Amount to be Charged: $<?php echo $amount_charge; ?></h3>
                    <div class="row">
                        <div style="color:red; text-align: center">
                    <?php
                    if (isset($msg) && !empty($msg)) {                       
                        echo $msg;
                      }
                    ?>
                    </div>
                        <p class="payment-errors rs_error"></p>
                        <form action="<?php echo BASE_URL; ?>user_controller/receive_token" method="POST" id="payment-form" class="rs_form">
                            <fieldset>
                              	<legend>Payment:</legend>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Card Number</label>
                                <input type="text" size="20" autocomplete="off" class="card-number" />
                                <input type="hidden" name="userid" value="<?php echo $userid; ?>">
                                <input type="hidden" name="amount_charge" value="<?php echo $amount_charge; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">CVC</label>
                                <input type="text" size="4" autocomplete="off" class="card-cvc" />
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Expiration (MM/YYYY)</label>
                                <input type="text" size="2" class="card-expiry-month"/>
                                <span> / </span>
                                <input type="text" size="4" class="card-expiry-year"/>
                            </div>
                            <div class="form-group rs_button">
                            <button type="submit" class="submit-button">Submit Payment</button>
                            </div>
                            </fieldset>
                        </form>
                         
                    </div>
                    <br style="clear:both"/>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('project_footer.php'); ?>