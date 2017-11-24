<?php

class Admin_controller extends Controller {

    public function __construct() {
        
    }

    function index() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $template = $this->loadView('admin_master');
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }

    public function add_member() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $template = $this->loadView('admin_add_member');
            $template->render();
        } else {
            $this->redirect('admin_login_controller/login');
        }
    }
  public function save_member() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $firstname = $_POST['firstname'];
            $surname = $_POST['surname'];
            $position = $_POST['position'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $organisation_name = $_POST['organisation_name'];
            $organisation_address = $_POST['organisation_address'];
            $organisation_tel = $_POST['organisation_tel'];
            $organisation_email = $_POST['organisation_email'];


            $error = array();
           if (empty($firstname)) {
                $error['firstname'] = 'Firstname Field Can not be Empty';
            }
            if (empty($surname)) {
                $error['surname'] = 'Surname Field Can not be Empty';
            }
            if (empty($position)) {
                $error['position'] = 'Position Field Can not be Empty';
            }
            if (empty($telephone)) {
                $error['telephone'] = 'Telephone Field Can not be Empty';
            }
            if (empty($email)) {
                $error['email'] = 'Email Field Can not be Empty';
            }
            if (empty($organisation_name)) {
                $error['organisation_name'] = 'Organisation Name Field Can not be Empty';
            }
            if (empty($organisation_email)) {
                $error['organisation_email'] = 'Organisation Email Can not be Empty';
            }
            if (empty($password)) {
                $error['password'] = 'Password Can not be Empty';
            }

            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $error['firstname_error'] = "Invalid organisation Name!";
            }

            if (!preg_match("/^[a-zA-Z ]*$/", $organisation_name)) {
                $error['organisation_name_error'] = "Invalid organisation Name!";
            }
            if (empty($error)) {
                //  echo 123; exit;
                $data = array(
                    'firstname' => $firstname,
                    'surname' => $surname,
                    'position' => $position,
                    'telephone' => $telephone,
                    'email' => $email,
                    'password' => $password,
                    'organisation_name' => $organisation_name,
                    'organisation_address' => $organisation_address,
                    'organisation_tel' => $organisation_tel,
                    'organisation_email' => $organisation_email
                );

                $sec_firstname = $_POST['sec_firstname'];
                $sec_surname = $_POST['sec_surname'];
                $sec_position = $_POST['sec_position'];
                $sec_telephone = $_POST['sec_telephone'];
                $sec_email = $_POST['sec_email'];

                $turnover_year = $_POST['turnover_year'];
                $turnover_amount = $_POST['turnover_amount'];
                $projected_budget = $_POST['projected_budget'];
                $postcode = $_POST['postcode'];
                $youngpeople = $_POST['youngpeople'];

                $s_data = array(
                    'sec_firstname' => $sec_firstname,
                    'sec_surname' => $sec_surname,
                    'sec_position' => $sec_position,
                    'sec_telephone' => $sec_telephone,
                    'sec_email' => $sec_email,
                    'turnover_year' => $turnover_year,
                    'turnover_amount' => $turnover_amount,
                    'projected_budget' => $projected_budget,
                    'postcode' => $postcode,
                    'youngpeople' => $youngpeople,
                );
                //print_r($email);die();
                $unique_email = $model->check_unique_email($email);
                //print_r($unique_email);die();
                if ($unique_email > 0) {
                    // $this->redirect('admin_controller/add_member');
                    // echo 'email already exists';
                    $duplicate_error = "email already exists";
                    $template = $this->loadView('admin_add_member');
                    $template->set('duplicate_error', $duplicate_error);
                    //    $template->render();
                    //  die();
                    //  $this->redirect('admin_controller/add_member');
                } else {
                    //echo 'here';
                    $res = $model->add_member_info($data);
                    $sres = $model->add_member_extra_info($s_data, $res);
                    /*
                     * mail
                     * 
                     */
                    //  ---------------------start user smail-----------------  
                   //  ---------------------start user smail-----------------  
                    $subject = "New account ";
                    $email = $_POST['email'];
                    $firstname = $_POST['firstname'];
$model2 = $this->loadModel('user_model');
$email_info=$model2->get_email_settings();
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$email_info['email_from_name'].' <'.$email_info['email_from'].'>' . "\r\n";
//                    $message = "Hello , $email
//                    Dear $firstname  ,Your account has been created Successfully.
//                     thank you :)
                    $message = '<html><body>';
                    $message .= '<p style="color:#000;">Hello ,' . $firstname . '</p>';
                    
                    $message .= '<p style="color:#000">Your account has been created Successfully</p>';
                    $message .= '<p style="color:#000">Your Email Address is:' .$email . ' </p>';
                    $message .= '<p style="color:#000">Password :' .$password. ' </p>';
                    $message .= '</body></html>';

               
                    mail($email, $subject, $message, $headers);
//              ---------------------end user smail----------------- 

                    $admin_id = $_SESSION['admin_id'];
                    $model2 = $this->loadModel('admin_login_model');
                    $result = $model2->select_profile_all_info_by_id($admin_id);
                   
                    $admin_email = $result[0]['email'];
//              ---------------------start admin email-----------------  
                    $subject = "New account sent successfully";
                 //   $admin_email = $result[0]['email'];
                    $email = $_POST['email'];
                    $firstname = $_POST['firstname'];


                    $message = '<html><body>';
                    $message .= '<p style="color:#000;">Hello ,' . $admin_email . '</p>';
                    $message .= '<h1 style="color:#000;">User Info:Here is the information</h1>';
                    $message .= '<p style="color:#000;">Firstname :' . $firstname . '</p>';
                    $message .= '<p style="color:#000;">Surname :' . $surname . '</p>';
                    $message .= '<p style="color:#000;">Email :' . $email . '</p>';
                    $message .= '<p style="color:#000;">Organisation Name :' . $organisation_name . '</p>';
                    $message .= '<p style="color:#000;">Organisation Address :' . $organisation_address . '</p>';
                    $message .= '<p style="color:#000;">Organisation email :' . $organisation_email . '</p>';
                    $message .= '<p style="color:#000;">Organisation tel :' . $organisation_tel . '</p>' . '<br>';

                    $message .= '<h3 style="color:#000;">Secondary Contact</h3>';

                    $message .= '<p style="color:#000;">Sec Firstname  :' . $sec_firstname . '</p>';
                    $message .= '<p style="color:#000;">Sec Position :' . $sec_position . '</p>';
                    $message .= '<p style="color:#000;">Sec  Telephone :' . $sec_telephone . '</p>';
                    $message .= '<p style="color:#000;">Turnover Amount :' . $turnover_amount . '</p>';
                    
                    $message .= '<h3 style="color:#000;">Turnover for last audited financial year (please state which year)</h3>';
                    
                    $message .= '<p style="color:#000;">Turnover Year :' . $turnover_year . '</p>';
                    $message .= '<p style="color:#000;">Projected Budget :' . $projected_budget . '</p>';
                    $message .= '<h3 style="color:#000;">Compulsory: to support our campaigns programme and to assess the reach of the collective membership please                      supply;Postcodes of your delivery areas:</h3>';
                    $message .= '<p style="color:#000;">Post Code :' . $postcode . '</p>';
   
                    $message .= '<h3 style="color:#000;">Approximately how many young people under 24 do you and your clubs/projects support each year?</h3>';

                    $message .= '<p style="color:#000;">Young People :' . $youngpeople . '</p>';
                    $message .= '</body></html>';
                    mail($admin_email, $subject, $message, $headers);
                    //  ---------------------end admin smail----------------- 


                   // $this->redirect('admin_controller/add_member');
                    $template = $this->loadView('admin_add_member');
                    $success_msg = "Member information Save Successfully!";
                    $template->set('success_msg', $success_msg);
                }
                //    }
            } else {
                $template = $this->loadView('admin_add_member');
                $template->set('result', $error);
            }
        } else {
            $this->redirect('admin_login_controller/index');
        }

        $template->render();
    }


    public function manage_member() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $result = $model->select_manage_member_info();
            $template = $this->loadView('admin_manage_member');
            $template->set('result', $result);
            //  print_r($result);
            //  die();
            $template->render();
        } else {
            $this->redirect('admin_login_controller/login');
        }
    }

    public function admin_edit_member($userid) {

        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $result = $model->select_user_by_id($userid);
            // print_r($result);die();

            $template = $this->loadView('admin_edit_member');
            $template->set('data', $result);
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }

    public function update_member() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
          //  echo $userid;
         //  echo $_SESSION['admin_username'];die();
            $model = $this->loadModel('admin_model');
            $firstname = $_POST['firstname'];
            $surname = $_POST['surname'];
            $position = $_POST['position'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $organisation_name = $_POST['organisation_name'];
            $organisation_address = $_POST['organisation_address'];
            $organisation_tel = $_POST['organisation_tel'];
            $organisation_email = $_POST['organisation_email'];


            $error = array();
            if (empty($firstname)) {
                $error['firstname'] = 'Firstname Field Can not be Empty';
            }
            if (empty($surname)) {
                $error['surname'] = 'Surname Field Can not be Empty';
            }
            if (empty($position)) {
                $error['position'] = 'Position Field Can not be Empty';
            }
            if (empty($telephone)) {
                $error['telephone'] = 'Telephone Field Can not be Empty';
            }
            if (empty($email)) {
                $error['email'] = 'Email Field Can not be Empty';
            }
            if (empty($organisation_name)) {
                $error['organisation_name'] = 'Organisation Name Field Can not be Empty';
            }
            if (empty($organisation_email)) {
                $error['organisation_email'] = 'Organisation Email Can not be Empty';
            }
           
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $error['firstname_error'] = "Invalid organisation Name!";
            }

            if (!preg_match("/^[a-zA-Z ]*$/", $organisation_name)) {
                $error['organisation_name_error'] = "Invalid organisation Name!";
            }

            if (empty($error)) {
                
                $data = array(
                    'firstname' => $firstname,
                    'surname' => $surname,
                    'position' => $position,
                    'telephone' => $telephone,
                    'email' => $email,
                    'password' => $password,
                    'organisation_name' => $organisation_name,
                    'organisation_address' => $organisation_address,
                    'organisation_tel' => $organisation_tel,
                    'organisation_email' => $organisation_email
                );
                
               //print_r($data);die();
                $userid = $_POST['userid'];

                $sec_firstname = $_POST['sec_firstname'];
                $sec_surname = $_POST['sec_surname'];
                $sec_position = $_POST['sec_position'];
                $sec_telephone = $_POST['sec_telephone'];
                $sec_email = $_POST['sec_email'];

                $turnover_year = $_POST['turnover_year'];
                $turnover_amount = $_POST['turnover_amount'];
                $projected_budget = $_POST['projected_budget'];
                $postcode = $_POST['postcode'];
                $youngpeople = $_POST['youngpeople'];

                $s_data = array(
                    'sec_firstname' => $sec_firstname,
                    'sec_surname' => $sec_surname,
                    'sec_position' => $sec_position,
                    'sec_telephone' => $sec_telephone,
                    'sec_email' => $sec_email,
                    'turnover_year' => $turnover_year,
                    'turnover_amount' => $turnover_amount,
                    'projected_budget' => $projected_budget,
                    'postcode' => $postcode,
                    'youngpeople' => $youngpeople,
                );
             
                $up_unique_email = $model->up_check_unique_email($email,$userid);
                //print_r($unique_email);die();
                if ($up_unique_email > 0) {
                   
                    $result = $model->select_user_by_id($userid);
                   // print_r($userid);die();
                    $duplicate_error = "email already exists";
                    $template = $this->loadView('admin_edit_member');
                    $template->set('duplicate_error', $duplicate_error);
                    $template->set('data', $result);
                  
                } else {
                    $update_res = $model->update_member_info($data, $userid); //$res=last insert id
                   
                    $update_sres = $model->update_member_extra_info($s_data, $userid);
                   
                    $this->redirect('admin_controller/admin_edit_member/' . $userid);
                   
                }
            } else {
              //  print_r($error);die();
                $userid = $_POST['userid'];
                $result = $model->select_user_by_id($userid);
                $template = $this->loadView('admin_edit_member');
                $template->set('result', $error);
                $template->set('data', $result);
               
            }
        }
 else {
        $this->redirect('admin_login_controller/index');
 }
 $template->render();
    }

    public function admin_delete_member($userid) {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $result = $model->delete_member_info_by_id($userid);
            $this->redirect('admin_controller/manage_member');
        } else {
            $this->redirect('admin_controller/index');
        }
    }

    public function csv_export() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $result = $model->select_manage_member_info();
            $file = fopen("memberdata.csv", "w");
            foreach ($result as $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            header("Content-Description: CSV export");
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=\"memberdata.csv\"");
            echo readfile("memberdata.csv");
        } else {
            $this->redirect('admin_controller/index');
        }
    }

    public function settings() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_model');
            $result = $model->getAll();
            $template = $this->loadView('admin_amount_settings');
            $template->set('result', $result);
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }

    public function update_settings() {
        //echo 2424;die();
        $model = $this->loadModel('admin_model');
        $newval = array();

        $newval['associate_amount'] = $_POST['associate_amount'];
        $key = 'associate_amount';
        $val = $newval['associate_amount'];
        $model->updateVal($val, $key);

        $newval['premium_amount'] = $_POST['premium_amount'];
        $key = 'premium_amount';
        $val = $newval['premium_amount'];
        $model->updateVal($val, $key);

        $newval['stripe_test_secret_key'] = $_POST['stripe_test_secret_key'];
        $key = 'stripe_test_secret_key';
        $val = $newval['stripe_test_secret_key'];
        $model->updateVal($val, $key);

        $newval['stripe_test_publishable_key'] = $_POST['stripe_test_publishable_key'];
        $key = 'stripe_test_publishable_key';
        $val = $newval['stripe_test_publishable_key'];
        $model->updateVal($val, $key);

        $newval['stripe_live_secret_key'] = $_POST['stripe_live_secret_key'];
        $key = 'stripe_live_secret_key';
        $val = $newval['stripe_live_secret_key'];
        $model->updateVal($val, $key);

        $newval['stripe_live_publishable_key'] = $_POST['stripe_live_publishable_key'];
        $key = 'stripe_live_publishable_key';
        $val = $newval['stripe_live_publishable_key'];
        $model->updateVal($val, $key);

        $newval['stripe_mode'] = $_POST['stripe_mode'];
        $key = 'stripe_mode';
        $val = $newval['stripe_mode'];
        $model->updateVal($val, $key);

        $newval['email_from'] = $_POST['email_from'];
        $key = 'email_from';
        $val = $newval['email_from'];
        $model->updateVal($val, $key);

        $newval['email_from_name'] = $_POST['email_from_name'];
        $key = 'email_from_name';
        $val = $newval['email_from_name'];
        $model->updateVal($val, $key);

        $this->redirect('admin_controller/settings');
    }
       public function view_details_member($userid) {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
      
            $model = $this->loadModel('admin_model');
            $result = $model->select_user_by_id($userid);
            // print_r($result);die();

            $template = $this->loadView('admin_view_details_member');
            $template->set('data', $result);
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }


}