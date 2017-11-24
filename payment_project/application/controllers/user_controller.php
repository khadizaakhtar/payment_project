<?php

require_once 'phpmailer/PHPMailerAutoload.php';
require 'stripe/init.php';

class User_Controller extends Controller {
	
	function index()
	{   
		$template = $this->loadView('user_register_form');
		$template->render();
	}
        public function register(){
              $model = $this->loadModel('user_model'); 
               if (isset($_POST) && !empty($_POST)) {
                    $this->firstname = $_POST['firstname'];
                    $this->surname = $_POST['surname'];
                    $this->position = $_POST['position'];
                    $this->telephone = $_POST['telephone'];
                    $this->email = $_POST['email'];
                    $this->password = $_POST['password'];
                    $this->organisation_name = $_POST['organisation_name'];
                    $this->organisation_address = $_POST['organisation_address'];
                    $this->organisation_tel = $_POST['organisation_tel'];
                    $this->organisation_email = $_POST['organisation_email'];
                    $this->sec_firstname = $_POST['sec_firstname'];
                    $this->sec_surname = $_POST['sec_surname'];
                    $this->sec_position = $_POST['sec_position'];
                    $this->sec_telephone = $_POST['sec_telephone'];
                    $this->turnover_year = $_POST['turnover_year'];
                    $this->turnover_amount = $_POST['turnover_amount'];
                    $this->sec_email = $_POST['sec_email'];
                    $this->projected_budget = $_POST['projected_budget'];
                    $this->postcode = $_POST['postcode'];
                    $this->youngpeople = $_POST['youngpeople'];   
                   
                    $data = array(
                           'firstname' => $this->firstname,
                           'surname' => $this->surname,
                           'position' =>$this->position,
                           'telephone' =>$this->telephone,
                           'email' =>$this->email,
                           'password' =>$this->password,
                           'organisation_name' =>$this->organisation_name,
                           'organisation_address' =>$this->organisation_address,
                           'organisation_tel' =>$this->organisation_tel,
                           'organisation_email' =>$this->organisation_email,
                          );
                     $sdata=array(
                          'sec_firstname' =>$this->sec_firstname,
                           'sec_surname' =>$this->sec_surname,
                           'sec_position' =>$this->sec_position,
                           'sec_telephone' =>$this->sec_telephone,
                           'turnover_year' =>$this->turnover_year,
                           'turnover_amount' =>$this->turnover_amount,
                           'projected_budget' =>$this->projected_budget,
                           'postcode' =>$this->postcode,
                           'youngpeople' =>$this->youngpeople,
                           'sec_email' =>$this->sec_email,
                     );
                   
                     $userid = $model->save_register_first_step($data);            
                     $result2 = $model->save_register_secound_step($sdata,$userid);
                    if (($userid && $result2) >0) {
                     $_POST = array();     
                     $template = $this->loadView('userstep3');
                     $template->set('userid',$userid);
		     $template->render();
                      }
               }
               else{
                   $this->redirect('user_controller');
               }
        }
        
        
        public function user_login(){      
        $template = $this->loadView('login_view');       
        $template->render();
            }
        
        public function check_login(){
            $session = $this->loadHelper('session_helper');
            $model = $this->loadModel('user_model');
            
             if (isset($_POST['email']) && isset($_POST['password'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $data = array(
                'email' => $this->email,
                'password' =>$this->password
            );
            $result = $model->check_login_info($data);
            if (count($result) > 0) {
                 if (!isset($_SESSION)) {
                    session_start();
                    }                   
               $session->set('userid', $result[0]['userid']);     
               $session->set('user_email', $result[0]['email']);
               $session->set('user_password', $result[0]['password']);
//               $userid=$result[0]['userid'];
//               echo $userid;
//               exit;
               $this->redirect('user_controller/members_view');
                }
              else{
                 $login_error_message="UserName or Password Is Invalid!"; 
                  $template = $this->loadView('login_view');
                  $template->set('login_error_message',$login_error_message);
                  $template->render();  
               }
             }
          }
             
                     
      public function members_view(){
             if (isset($_SESSION['user_email']) && $_SESSION['user_password'] != '') {
             $userid=$_SESSION['userid'];           
             $model = $this->loadModel('user_model');
             $result = $model->view_all_members($userid);
             $template = $this->loadView('members_view'); 
             $template->set('result',$result);
             $template->render();
             }
             else{
                $this->redirect('user_controller/user_login'); 
              }
          }
       
          public function details_members($userid){
               if (isset($_SESSION['user_email']) && $_SESSION['user_password'] != '') {
                    $model = $this->loadModel('user_model');
                    $result = $model->view_all_members_info($userid);
                   if (count($result) > 0) {
                        $template = $this->loadView('single_members_view'); 
                        $template->set('result',$result);
                        $template->render();
                     } 
               }
                else{
                $this->redirect('user_controller/user_login'); 
              }     
          }
          
          
      public function edit_members($userid){
        if (isset($_SESSION['user_email']) && $_SESSION['user_password'] != '') {
          
                    $model = $this->loadModel('user_model');
                    $result = $model->view_all_members_info($userid);
                   if (count($result) > 0) {
                       $template = $this->loadView('edit_members'); 
                        $template->set('result',$result);
                        $template->render();
                     }
                     else{
                         echo 'sorry there is no results!';
                       }
               }
                else{
                $this->redirect('user_controller/user_login'); 
              }       
      }
      
      
      
     public function update_register(){  
       $model = $this->loadModel('user_model'); 
               if (isset($_POST) && !empty($_POST)) {
                    $this->firstname = $_POST['firstname'];
                    $this->surname = $_POST['surname'];
                    $this->position = $_POST['position'];
                    $this->telephone = $_POST['telephone'];
                    $this->email = $_POST['email'];
                    $this->password = $_POST['password'];
                    $this->organisation_name = $_POST['organisation_name'];
                    $this->organisation_address = $_POST['organisation_address'];
                    $this->organisation_tel = $_POST['organisation_tel'];
                    $this->organisation_email = $_POST['organisation_email'];
                    $this->sec_firstname = $_POST['sec_firstname'];
                    $this->sec_surname = $_POST['sec_surname'];
                    $this->sec_position = $_POST['sec_position'];
                    $this->sec_telephone = $_POST['sec_telephone'];
                    $this->turnover_year = $_POST['turnover_year'];
                    $this->turnover_amount = $_POST['turnover_amount'];
                    $this->projected_budget = $_POST['projected_budget'];
                    $this->postcode = $_POST['postcode'];
                    $this->youngpeople = $_POST['youngpeople']; 
                    $this->userid=$_POST['userid'];
                    $this->membership_level=$_POST['membership_level'];
                    $userid=$this->userid;
                    $email=$this->email;
                    $password=md5($this->password);
                     $data = array(
                           'firstname' => $this->firstname,
                           'surname' => $this->surname,
                           'position' =>$this->position,
                           'telephone' =>$this->telephone,
                           'email' =>$this->email,
                           'organisation_name' =>$this->organisation_name,
                           'organisation_address' =>$this->organisation_address,
                           'organisation_tel' =>$this->organisation_tel,
                           'organisation_email' =>$this->organisation_email,
                            'membership_level' =>$this->membership_level,
                          );
                     $sdata=array(
                          'sec_firstname' =>$this->sec_firstname,
                           'sec_surname' =>$this->sec_surname,
                           'sec_position' =>$this->sec_position,
                           'sec_telephone' =>$this->sec_telephone,
                           'turnover_year' =>$this->turnover_year,
                           'turnover_amount' =>$this->turnover_amount,
                           'projected_budget' =>$this->projected_budget,
                           'postcode' =>$this->postcode,
                           'youngpeople' =>$this->youngpeople,
                     );
                     $test_unique=$model->check_unique_email_update($email, $userid);
                     if($test_unique>0){
                        $result = $model->view_all_members_info($userid);
                        $msg="your email address already exists!";
                        $template = $this->loadView('edit_members'); 
                        $template->set('result',$result);
                        $template->set('msg',$msg);
                        $template->render(); 

                       }
                       else{
                       
                     $result = $model->update_register_first_step($data,$userid);  
                  if(!empty($password)){
                         $result3= $model->update_register_password_first_step($password,$userid); 
                     }       
                     $result2 = $model->update_register_secound_step($sdata,$userid);
                      if (($result && $result2) >0) {
                         $this->redirect('user_controller/members_view');
                      }
                    }
               }  
     } 
     
     public function renew_members($userid){
           if (isset($_SESSION['user_email']) && $_SESSION['user_password'] != '') {
           $model = $this->loadModel('user_model');    
           $result = $model->view_all_members_info($userid);  
            if (count($result) > 0) {
           $template = $this->loadView('renew_members'); 
           $template->set('result',$result);
           $template->render();
            }
           }
       else{
            $this->redirect('user_controller/user_login'); 
          }        
     }
     
     public function update_renew(){
            $model = $this->loadModel('user_model'); 
               if (isset($_POST) && !empty($_POST)) {
                    $this->firstname = $_POST['firstname'];
                    $this->surname = $_POST['surname'];
                    $this->position = $_POST['position'];
                    $this->telephone = $_POST['telephone'];
                    $this->email = $_POST['email'];
                    $this->password = $_POST['password'];
                    $this->organisation_name = $_POST['organisation_name'];
                    $this->organisation_address = $_POST['organisation_address'];
                    $this->organisation_tel = $_POST['organisation_tel'];
                    $this->organisation_email = $_POST['organisation_email'];
                    $this->sec_firstname = $_POST['sec_firstname'];
                    $this->sec_surname = $_POST['sec_surname'];
                    $this->sec_position = $_POST['sec_position'];
                    $this->sec_telephone = $_POST['sec_telephone'];
                    $this->turnover_year = $_POST['turnover_year'];
                    $this->turnover_amount = $_POST['turnover_amount'];
                    $this->projected_budget = $_POST['projected_budget'];
                    $this->postcode = $_POST['postcode'];
                    $this->youngpeople = $_POST['youngpeople']; 
                    $this->membership_level=$_POST['membership_level'];
                    $this->userid=$_POST['userid'];
                    $userid=$this->userid;
                    $email=$this->email;

                    $password=md5($this->password);
                     $data = array(
                           'firstname' => $this->firstname,
                           'surname' => $this->surname,
                           'position' =>$this->position,
                           'telephone' =>$this->telephone,
                           'email' =>$this->email,
                           'organisation_name' =>$this->organisation_name,
                           'organisation_address' =>$this->organisation_address,
                           'organisation_tel' =>$this->organisation_tel,
                           'organisation_email' =>$this->organisation_email,
                           'membership_level' =>$this->membership_level,
                          );
                     $sdata=array(
                          'sec_firstname' =>$this->sec_firstname,
                           'sec_surname' =>$this->sec_surname,
                           'sec_position' =>$this->sec_position,
                           'sec_telephone' =>$this->sec_telephone,
                           'turnover_year' =>$this->turnover_year,
                           'turnover_amount' =>$this->turnover_amount,
                           'projected_budget' =>$this->projected_budget,
                           'postcode' =>$this->postcode,
                           'youngpeople' =>$this->youngpeople,
                     );
                        $test_unique=$model->check_unique_email_update($email, $userid);
                         if($test_unique>0){
                         
                        $result = $model->view_all_members_info($userid);
                        $msg="your email address already exists!";
                        $template = $this->loadView('renew_members'); 
                        $template->set('result',$result);
                        $template->set('msg',$msg);
                        $template->render(); 
                         
                         }else{

                     $result = $model->update_register_first_step($data,$userid); 
                      if(!empty($password)){
                         $result3= $model->update_register_password_first_step($password,$userid); 
                     }           
                     $result2 = $model->update_register_secound_step($sdata,$userid);
                      if (($result && $result2) >0) {
                     $this->redirect('user_controller/members_view');                   
                      }
                      }
                      
               }  
     }
        
        public function update_membership_level(){
            if (isset($_POST) && !empty($_POST)) {
             $model = $this->loadModel('user_model');
              
            $this->userid = $_POST['userid'];
            $this->membership_level = $_POST['membership_level'];
             $userid=$this->userid;
             $membership_level= $this->membership_level;
             $result = $model->update_membership_level_info($membership_level,$userid);            
             $result2=$model->select_amount_by_membership_level($membership_level);
             $result3=$model->select_key_info();
             //print_r($result3);
              //exit;
             $amount=$result2[0]['val'];
             $amount_charge=$amount;
              if (count(($result) && ($result3)) > 0) {
                 $template = $this->loadView('userstep4');
                 $template->set('userid',$userid);
                 $template->set('membership_level',$membership_level);
                 $template->set('amount_charge',$amount_charge);
                 $template->set('result',$result3);
                 $template->render();
                 }
              else{
                  $this->redirect('user_controller'); 
              }
            }
            else{
                $this->redirect('user_controller');
            }
        }
        
       public function logout(){
            $session = $this->loadHelper('session_helper');
            session_destroy();
            $this->redirect('user_controller/user_login');
       }
       
       
       public function receive_token(){
          $userid=$_POST['userid'];
          $amount=$_POST['amount_charge'];
          $amount_charge=$amount*100;
          $payment_date=date('Y-m-d');
          $model = $this->loadModel('user_model');
           if ($_POST) {

           $api_key=$model->select_key_for_payment(); 
            if($api_key['stripe_mode']=='test'){

             $apikey=$api_key['stripe_test_secret_key'];
           \Stripe\Stripe::setApiKey("sk_test_ExUFgr10VuwDWIq21f5zrU3o");
                }
              else{
              $apikey=$api_key['stripe_live_secret_key'];
             \Stripe\Stripe::setApiKey($apikey);  
               }


           $error = '';
           $success = '';
            try {
                if (!isset($_POST['stripeToken']))
                throw new Exception("The Stripe Token was not generated correctly");
                $charge = \Stripe\Charge::create(array(
                "amount" =>$amount_charge, // amount in cents, again
                "currency" => "usd",
                "source" => $_POST['stripeToken'],
                "description" => "Example charge")
                );
        if ($charge->status == 'succeeded') {
            
               $payment_log=serialize($charge);
               //$model = $this->loadModel('user_model');
               $renewaldate=date('Y-m-d', strtotime('+1 months'));
               $result = $model->update_renewal_date($userid,$renewaldate);
               $result2=$model->select_all_register_info($userid);
               $email_info=$model->get_email_settings();
               $result3=$model->select_admin_info();
               
               $admin_email=$result3[0]['email']; //admin email address
               $user_email=$result2[0]['email']; //register user email address
               $user_password=$result2[0]['password']; //register user password
               $rnewdate=$result2[0]['renewaldate'];
               $formatted_date = date('m/d/Y', strtotime($rnewdate)); 
               if($result2[0]['status']==0){
                   $r='Inactive';
               }else{
                   $r="Active";
               }
                
               if($result2[0]['membership_level']=='premium_amount'){
                    $rs="Premium";
                  }else{
                    $rs="Associate";
                    }
                
               $success = 'Your payment has gone through sucessfully.';
               
               $html='<div class="container">
                         <h1>New Registered User Information</h1>
                         <div class="row">
                            <div class="col-md-6"><span>Organization name:</span><span class="nrspan">' . $result2[0]['userid'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Organization name:</span><span class="nrspan">' . $result2[0]['organisation_name'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>First name:</span><span class="nrspan">' . $result2[0]['firstname'] . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Surname:</span><span class="nrspan">' . $result2[0]['surname'] . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Position:</span><span class="nrspan">' . $result2[0]['position'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Tel:</span><span class="nrspan">' . $result2[0]['telephone'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Email:</span><span class="nrspan">' . $result2[0]['email'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Membership level:</span><span class="nrspan">' . $rs . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Status:</span><span class="nrspan">' . $r . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Renewal date:</span><span class="nrspan">' . $formatted_date . '</span></div>
                        </div>
                         <div class="row">
                           <h3>Secondary Contact:</h3>   
                          </div>
                        <div class="row">
                            <div class="col-md-6"><span>First name:</span><span class="nrspan">' . $result2[0]['sec_firstname'] . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Surname:</span><span class="nrspan">' . $result2[0]['sec_surname'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Position:</span><span class="nrspan">' . $result2[0]['sec_position'] . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Tel:</span><span class="nrspan">' . $result2[0]['sec_telephone'] . '</span></div>
                        </div>
                         <div class="row">
                            <div class="col-md-6"><span>Email:</span><span class="nrspan">' . $result2[0]['sec_email'] . '</span></div>
                        </div>
                        <div class="row">
                            <h3>Turnover for last audited financial year (please state which year)</h3>
                            <div class="col-md-6"><span>Turnover Year:</span><span class="nrspan">' . $result2[0]['turnover_year'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Turnover Amount:</span><span class="nrspan">' . $result2[0]['turnover_amount'] . '</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><span>Projected budget:</span><span class="nrspan">' . $result2[0]['projected_budget'] . '</span></div>
                        </div>
                        <div class="row">
                          <h3>Compulsory:  to support our campaigns programme and to assess the reach of the collective membership please supply;Postcodes of your delivery areas:</h3>
                            <div class="col-md-6"><span>Postcode:</span><span class="nrspan">' . $result2[0]['postcode'] . '</span></div>
                        </div>
                        <div class="row">
                          <h3>Approximately how many young people under 24 do you and your clubs/projects support each year?</h3>
                            <div class="col-md-6"><span>Young People:</span><span class="nrspan">' . $result2[0]['youngpeople'] . '</span></div>
                        </div>
                      </div>';
               
               $mail = new PHPMailer;
               $mail2 = new PHPMailer;
               $mail->addAddress($admin_email); 
               $mail2->addAddress($user_email); 
               $mail->setFrom($email_info['email_from'], 'Mailer');
               $mail->addReplyTo($email_info['email_from_name'], 'Mailer');
               
               $mail2->setFrom($email_info['email_from'], 'Mailer');
               $mail2->addReplyTo($email_info['email_from_name'], 'Mailer');
               
               $mail->isHTML(true); 
               $mail->Subject = "New Registered User Information";
               $mail->Body    = $html;
               $mail->AltBody = $html; 
               
               $mail2->Subject = "Your Register Info";
               $mail2->Body    = "Hello,Your Registration Is Successfully Completed! Your Email is :".$user_email."
               Your Password is: ".$user_password." ";
               $mail2->AltBody = "Hello,Your Registration Is Successfully Completed! Your Email is :".$user_email."
               Your Password is: ".$user_password." "; 
             
               
               if(!(($mail->send()) && ($mail2->send()))) {
               $session = $this->loadHelper('session_helper');                 
                if (!isset($_SESSION)){
                    session_start();
                        }                   
               $session->set('error','Mailer Error:'.$mail->ErrorInfo); 
               $template = $this->loadView('userstep3');                   
	       $template->render();
                
                       }
                else{
                  $data=array(
                      'userid'=>$userid,
                      'payment_amount'=>$amount_charge,
                      'payment_date'=>$payment_date,
                      'payment_log'=>$payment_log,
                  );
                 $session = $this->loadHelper('session_helper');  
                 $result4=$model->insert_log_with_payment($data);
                 $msg2="Your Account Registration Successfull!";
                  if (!isset($_SESSION)){
                    session_start();
                        }                   
               $session->set('msg2',$msg2);
                 $this->redirect('user_controller/success');  
                }             
                       
        } else {
                $success = 'Your payment failed.';
        }
} catch(\Stripe\Error\Card $e) {
        // The card has been declined
        $error = $e->getMessage();
}
echo $success;
echo $error;
                }
       }

  public function success(){
 $template = $this->loadView('successpage');                 
 $template->render();

}
       
   
  public function view_email(){
       $template = $this->loadView('viewemailpage');
       $template->render();   
       }
       
   public function check_email_address(){
     $session = $this->loadHelper('session_helper');
     $model = $this->loadModel('user_model'); 
     $email=$_POST['email'];
     $result = $model->check_email_address_info($email);
     if(count($result)){
     $username=$result[0]['firstname'];
     }




     if (count($result) > 0) {
             $userid=$result[0]['userid'];         
             $code = rand(100, 999);
             $result2 = $model->update_postcode_by_userid($userid,$code);
             $subject = "Reset Your Password";
             $email = $_POST['email'];
             $url=BASE_URL.'user_controller/forgot_password/?code='.$code;

             //$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
             //$headers= "From: ".$email_info['email_from']."\r\n";
             //$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
             
             
// To send HTML mail, the Content-type header must be set
            $email_info=$model->get_email_settings();
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$email_info['email_from_name'].' <'.$email_info['email_from'].'>' . "\r\n";


             $message = "Hello , $username<br/>
             We got your request to reset your password,<br/><br/>If you do this then just click the following link to reset your password, if not just ignore this email<br/>
             Click Following Link To Reset Your Password<br/>
             <a href='".$url."'>click here to reset your password</a></br><br/>
            Thank you :)
       ";



       if(mail($email, $subject,$message,$headers)){

          if (!isset($_SESSION)) {
                    session_start();
                    }
           $msg="An e-mail has been sent with further instructions";
           $session->set('msg',$msg);   

          $this->redirect('user_controller/view_email');
          } 
     }
     else{

       if (!isset($_SESSION)) {
                    session_start();
                    }
       $exc="Sorry, your email address is invalid. Please check the email address you entered.";
       $session->set('exc',$exc);   
       $this->redirect('user_controller/view_email');  
     }
    }
    
     public function forgot_password() {
        $code=$_GET['code'];
        $model = $this->loadModel('user_model');
        $check_code= $model->check_code_for_reset_password($code);
        if(count($check_code)>0){
        $template = $this->loadView('user_update_password');
        $template->set('code',$code);
        $template->render();   
        }
        else{
            echo 'your post code is invalid!';
        }
       }
       
    public function update_forgot_password(){
        $session = $this->loadHelper('session_helper');
        $model = $this->loadModel('user_model');
        if (isset($_POST) && !empty($_POST['password'] && $_POST['retype_password'])) {
        $this->password = $_POST['password'];
        $this->retype_password = $_POST['retype_password'];
        $code=$_POST['code'];
        $data = array(
            'password' => md5($this->password),
            'retype_password' =>md5($this->retype_password),
        );
        if ($data['password'] == $data['retype_password']) {
            $update_result = $model->update_forgot_password_info($data,$code);
              if(count($update_result)>0){
                 $msg="Your Password Update Successfull!";
                 $template = $this->loadView('user_update_password');
                 $template->set('msg',$msg);
                 $template->render();   
                 }
        } else {
            echo 0;
        }
}else{
     if (!isset($_SESSION)) {
                    session_start();
                    }
       $msg3="Please give valid password!";
       $session->set('msg3',$msg3);
      
     $this->redirect('user_controller/forgot_password');

   }
        die();  
    }


  public function check_unique_email(){
        $email=$_POST['email'];
        $model = $this->loadModel('user_model');
        $result = $model->check_unique_email($email);
         $json=array();
         if($result==0){
         $json['success']=1;
            $json['msg']="";
       }
       else{
           $json['success']=0;   
           $json['msg']='Your Email Address Already Exists!';
        }

        echo json_encode($json);
    }   
}

?>
