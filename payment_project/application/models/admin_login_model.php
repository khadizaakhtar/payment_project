<?php

class Admin_login_model extends Model {

    public function index() {
        
    }

    public function check_login_info($data) {
        //  echo 3453245;
        //die();
        $result = $this->query("SELECT * FROM adminusers WHERE email='$data[email]' AND password=md5('$data[password]')");
        return $result;
    }


    public function select_profile_all_info_by_id($admin_id) {
        $result = $this->querynr("SELECT adminusers.*  FROM adminusers "
                . "WHERE  adminusers.id=" . $admin_id);
        return $result;
    }

    public function update_admin_info($admin_id, $data) {
    
        $result = $this->execute("UPDATE adminusers SET  username='" . $data['username'] . "' , email='" . $data['email'] . "' WHERE    adminusers.id=" . $admin_id);
        return $result;
    }

  public function update_admin_password($admin_id, $password) {
        $result = $this->execute("UPDATE adminusers SET  password='" . md5($password) . "' WHERE  adminusers.id=" . $admin_id);
        return $result;
    }

//    -------------------------Forgot Password Portion ------------------------------


    public function check_email_address_info($email) {
        $result = $this->querynr("SELECT * FROM adminusers WHERE email='" . $email . "'");
        // print_r($result);die();
        return $result;
    }

    public function update_postcode_by_userid($userid, $code) {
        //  echo 42;
        $result = $this->execute("UPDATE adminusers SET postcode='" . $code . "' WHERE id='" . $userid . "'");
        // print_r($result);die();
        return true;
    }

    public function check_code_for_reset_password($code) {
        $result = $this->querynr("SELECT * FROM adminusers WHERE postcode='" . $code . "'");
        return $result;
    }

    public function update_forgot_password_info($data, $code) {
        $result = $this->execute("UPDATE  adminusers SET  password='" . $data['password'] . "' WHERE  postcode='" . $code . "' ");
        return $result;
    }

}
