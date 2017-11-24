<?php

class Admin_login_controller extends Controller {

    public function __construct() {
        
    }

    public function index() {

        $template = $this->loadView('admin_login_view');
        $template->render();
    }

    public function admin_login_check() {

        $model = $this->loadModel('admin_login_model');
        $session = $this->loadHelper('session_helper');
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {

            $this->redirect('admin_controller/admin_master');
        }
        //echo $_POST['email'];exit();
        if (isset($_POST['email']) && isset($_POST['password'])) {
            // $this->username = isset($_POST['username']);
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $data = array(
                'email' => $this->email,
                'password' => $this->password
            );
            $result = $model->check_login_info($data);

            if (count($result) > 0) {
                if (!isset($_SESSION)) {
                    session_start();
                }
             //   echo $_SESSION;
                //  print_r($result);die();
                //die();
                $_SESSION['admin_id'] = $result[0][0];
                $_SESSION['admin_username'] = $result[0][1];
                $_SESSION['admin_email'] = $result[0][2];
                $this->redirect('admin_controller/manage_member');
            } else {
                
                $template = $this->loadView('admin_login_view');
                $err_msg = "Your Email Or Password Is Invalid!";
                $template->set('err_msg', $err_msg);

            }
        }
        $template->render();
    }

    public function logout() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $session = $this->loadHelper('session_helper');
            session_destroy();
            $template = $this->loadView('admin_login_view');
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }


    public function profile() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $admin_id = $_SESSION['admin_id'];
            //  print_r($admin_id);die();
            $model = $this->loadModel('admin_login_model');
            $result = $model->select_profile_all_info_by_id($admin_id);
            $template = $this->loadView('admin_profile');
            $template->set('result', $result);
            $template->render();
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }

    public function update_admin_profile() {
        if (isset($_SESSION['admin_username']) && $_SESSION['admin_username'] != '') {
            $model = $this->loadModel('admin_login_model');
            $admin_id = $_POST['id'];
            $name = $_POST['username'];
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $data = array(
                'id' => $admin_id,
                'username' => $name,
                'email' => $email,
                'password' => $password,
            );
            $result = $model->update_admin_info($admin_id, $data);
           if ($password != '') {
                $result = $model->update_admin_password($admin_id, $password);
            }
            $this->redirect('admin_login_controller/profile');
        } else {
            $this->redirect('admin_login_controller/index');
        }
    }



//    -------------1
    public function view_email() {
        $template = $this->loadView('admin_viewemailpage');
        $template->render();
    }

//    ---------------2
    public function check_email_address() {
        $session = $this->loadHelper('session_helper');
        $model = $this->loadModel('admin_login_model');
        $email = $_POST['email'];
       // print_r($email);die();
        $result = $model->check_email_address_info($email);
       //print_r($result);die();
        $username = $result[0]['username'];
        if (count($result) > 0) {
            $userid = $result[0]['id'];
          //  print_r($userid);die();
            $code = rand(100, 999);
            $result2 = $model->update_postcode_by_userid($userid, $code);
            //print_r($result2 );die();
            $subject = "Reset Your Password";
            $email = $_POST['email'];
            $url = BASE_URL . 'admin_login_controller/forgot_password/?code=' . $code;
            $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "Hello , $username<br/>
             We got your request to reset your password,<br/><br/>If you do this then just click the following link to reset your password, if not just ignore this email<br/>
             Click Following Link To Reset Your Password<br/>
             <a href='" . $url . "'>click here to reset your password</a></br><br/>
            Thank you :)
       ";
$model2 = $this->loadModel('user_model');
$email_info=$model2->get_email_settings();
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$email_info['email_from_name'].' <'.$email_info['email_from'].'>' . "\r\n";


            if (mail($email, $subject, $message, $headers)) {

                if (!isset($_SESSION)) {
                    session_start();
                }
                $msg = "An e-mail has been sent with further instructions";
                $session->set('msg', $msg);

                $this->redirect('admin_login_controller/view_email');
            }
        } else {
            if (!isset($_SESSION)) {
                session_start();
            }
            $exc = "Sorry, your email address is invalid. Please check the email address you entered.";
            $session->set('exc', $exc);
            $this->redirect('admin_login_controller/view_email');
        }
    }

//    -----3

    public function forgot_password() {
        $code = $_GET['code'];

        $model = $this->loadModel('admin_login_model');
        $check_code = $model->check_code_for_reset_password($code);
        if (count($check_code) > 0) {
            $template = $this->loadView('admin_update_password');
            $template->set('code', $code);
            $template->render();
        } else {
            echo 'your post code is invalid!';
        }
    }

    //    -----4
    public function update_forgot_password() {
        $session = $this->loadHelper('session_helper');
        $model = $this->loadModel('admin_login_model');
        if (isset($_POST) && !empty($_POST['password'] && $_POST['retype_password'])) {
            $this->password = $_POST['password'];
            $this->retype_password = $_POST['retype_password'];
            $code = $_POST['code'];
            $data = array(
                'password' => md5($this->password),
                'retype_password' => md5($this->retype_password),
            );
            if ($data['password'] == $data['retype_password']) {
                $update_result = $model->update_forgot_password_info($data, $code);
                if (count($update_result) > 0) {
                    $msg = "Your Password Update Successfull!";
                    $template = $this->loadView('admin_update_password');
                    $template->set('msg', $msg);
                    $template->render();
                }
            } else {
                echo 0;
            }
        } else {
            if (!isset($_SESSION)) {
                session_start();
            }
            $msg3 = "Please give valid password!";
            $session->set('msg3', $msg3);

            $this->redirect('admin_login_controller/forgot_password');
        }
        die();
    }
    
//    ----------------------------------End------------------------------------

}