<?php

class Admin_model extends Model {

    public function edit_profile_by_id() {
        
    }

    public function add_member_info($data) {
        $res = $this->insert("INSERT INTO users SET
            firstname= '" . $data['firstname'] . "',
            surname='" . $data['surname'] . "',
            position='" . $data['position'] . "',
            telephone='" . $data['telephone'] . "',
            email='" . $data['email'] . "',
            password='" . md5($data['password']) . "',
            organisation_name='" . $data['organisation_name'] . "',
            organisation_address='" . $data['organisation_address'] . "',
            organisation_tel='" . $data['organisation_tel'] . "',
            organisation_email='" . $data['organisation_email'] . "'

        ");
        return $res;
    }

    public function add_member_extra_info($s_data, $res) {
      // echo $res;
      // print_r($s_data);exit;

        $sres = $this->insert("INSERT INTO userextrainfo SET
            userid= '" . $res . "',
            sec_firstname= '" . $s_data['sec_firstname'] . "',
            sec_surname='" . $s_data['sec_surname'] . "',
            sec_position='" . $s_data['sec_position'] . "',
            sec_telephone='" . $s_data['sec_telephone'] . "',
            sec_email='" . $s_data['sec_email'] . "',
            turnover_year= '" . $s_data['turnover_year'] . "',
            turnover_amount='" . $s_data['turnover_amount'] . "',
            projected_budget='" . $s_data['projected_budget'] . "',
            postcode='" . $s_data['postcode'] . "',
            youngpeople='" . $s_data['youngpeople'] . "'
        ");
      //  print_r($sres);exit;
        return $sres;
    }

    public function select_manage_member_info() {

        $result = $this->querynr("SELECT users.*,userextrainfo.sec_firstname,"
                . "userextrainfo.sec_surname,userextrainfo.sec_position,"
                . "userextrainfo.sec_telephone,userextrainfo.sec_email, "
                . "userextrainfo.turnover_year,userextrainfo.turnover_amount,"
                . "userextrainfo.projected_budget,userextrainfo.projected_budget, "
                . "userextrainfo.postcode,userextrainfo.youngpeople "
                . "FROM users,userextrainfo WHERE "
                . "users.userid=userextrainfo.userid");
        return $result;
    }

       public function select_user_by_id($userid) {
        $result = $this->querynr("SELECT users.*,userextrainfo.* FROM users,userextrainfo "
                . "WHERE users.userid=userextrainfo.userid AND users.userid=" . $userid);
      //  print_r($result);
     //   die();
        foreach ($result as $value) {
            $data = array(
                'userid' => $value['userid'],
                'email' => $value['email'],
                'password' => $value['password'],
                'email' => $value['email'],
                'firstname' => $value['firstname'],
                'surname' => $value['surname'],
                'position' => $value['position'],
                'telephone' => $value['telephone'],
                'organisation_name' => $value['organisation_name'],
                'organisation_address' => $value['organisation_address'],
                'organisation_tel' => $value['organisation_tel'],
                'organisation_email' => $value['organisation_email'],
                'status' => $value['status'],
                'sec_firstname' => $value['sec_firstname'],
                'sec_surname' => $value['sec_surname'],
                'sec_position' => $value['sec_position'],
                'sec_telephone' => $value['sec_telephone'],
                'sec_email' => $value['sec_email'],
                'turnover_year' => $value['turnover_year'],
                'turnover_amount' => $value['turnover_amount'],
                'projected_budget' => $value['projected_budget'],
                'postcode' => $value['postcode'],
                'youngpeople' => $value['youngpeople'],
            );
        }
      //  print_r($data);die();
        return $data;
    }

    public function update_member_info($data, $userid) {
               
        $update_res = $this->execute("UPDATE  users SET
            firstname= '" . $data['firstname'] . "',
            surname='" . $data['surname'] . "',
            position='" . $data['position'] . "',
            telephone='" . $data['telephone'] . "',
            email='" . $data['email'] . "',
            organisation_name='" . $data['organisation_name'] . "',
            organisation_address='" . $data['organisation_address'] . "',
            organisation_tel='" . $data['organisation_tel'] . "',
            organisation_email='" . $data['organisation_email'] . "'
            WHERE  users.userid=" . $userid
        );
        return $update_res;
    }

    public function update_member_extra_info($s_data, $userid) {
        $update_sres = $this->execute("UPDATE userextrainfo SET  
            sec_firstname= '" . $s_data['sec_firstname'] . "',
            sec_surname='" . $s_data['sec_surname'] . "',
            sec_position='" . $s_data['sec_position'] . "',
            sec_telephone='" . $s_data['sec_telephone'] . "',
            sec_email='" . $s_data['sec_email'] . "',
            turnover_year= '" . $s_data['turnover_year'] . "',
            turnover_amount='" . $s_data['turnover_amount'] . "',
            projected_budget='" . $s_data['projected_budget'] . "',
            postcode='" . $s_data['postcode'] . "',
            youngpeople='" . $s_data['youngpeople'] . "'   
            WHERE  userextrainfo.userid=" . $userid
        );
        return $update_sres;
    }

    public function delete_member_info_by_id($userid) {
        $result = $this->execute("DELETE users.*, userextrainfo.* from users,userextrainfo "
                . "WHERE users.userid=userextrainfo.userid AND users.userid='$userid'");
        return $result;
    }

    public function getAll() {
        $result = $this->querynr("SELECT * FROM settings");
       //echo '<pre>';
      //  print_r($result);die();
        $setresult = array();
        foreach ($result as $k => $v) {
            $setresult[$v['key']] = $v['val'];
        }
        //print_r($setresult);die();
        return $setresult;
    }

    public function updateVal($newval, $key) {
        /// echo $newval; echo $key;die();
        //   echo "UPDATE `settings` SET  `val`= '" . $newval . "' WHERE `key`= '" . $key . "' ";  die();
        $sql = $this->execute("UPDATE `settings` SET  `val`= '" . $newval . "' WHERE `key`= '" . $key . "'");
    }
    public function check_unique_email($email) {
        $result = $this->querynr("SELECT COUNT(*) as total FROM users WHERE email='" . $email . "'");
       // print_r($result);die();
        return $result[0]['total'];
    }

 public function up_check_unique_email($email,$userid) {
        //echo $id;die();
        $result = $this->querynr("SELECT COUNT(*) as total FROM users WHERE email ='" . $email . "' AND userid!=$userid");
        //print_r($result);die();
        return $result[0]['total'];
    }


}