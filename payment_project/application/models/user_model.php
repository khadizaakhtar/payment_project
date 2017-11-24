<?php
class User_Model extends Model {
   public function save_register_first_step($data){
    $date=date('Y-m-d H:i:s');
        $result = $this->insert("INSERT INTO users (firstname,surname,position,telephone,email,password,organisation_name,organisation_address,organisation_tel,organisation_email,createddate,renewaldate,nextrenewaldate)" . "VALUES('$data[firstname]','$data[surname]','$data[position]','$data[telephone]','$data[email]',md5('$data[password]'),'$data[organisation_name]','$data[organisation_address]','$data[organisation_tel]','$data[organisation_email]','".$date."','".$date."','".$date."')");
        return $result;
   } 
   public function save_register_secound_step($sdata,$userid){
       $result = $this->insert("INSERT INTO userextrainfo (sec_firstname,sec_surname,sec_position,sec_telephone,turnover_year,turnover_amount,projected_budget,postcode,youngpeople,userid,sec_email) "
                . "VALUES('$sdata[sec_firstname]','$sdata[sec_surname]','$sdata[sec_position]','$sdata[sec_telephone]','$sdata[turnover_year]','$sdata[turnover_amount]','$sdata[projected_budget]','$sdata[postcode]','$sdata[youngpeople]',$userid,'$sdata[sec_email]')");
        return true;
   }
   public function check_login_info($data){
     $result = $this->querynr("SELECT * FROM users WHERE email='$data[email]' AND password=md5('$data[password]')");
     return $result;
    
   }
   public function update_membership_level_info($membership_level,$userid){
       $result = $this->execute("UPDATE users SET membership_level='".$membership_level."' WHERE userid='".$userid."'");
       return true;
   }

   public function view_all_members($userid){
        $result = $this->querynr("SELECT * FROM users WHERE userid=" . $userid);
        return $result;
   }
  public function view_all_members_info($userid){
        $result = $this->querynr("SELECT users.*,userextrainfo.* FROM users,userextrainfo WHERE users.userid=userextrainfo.userid AND users.userid=".$userid);         
        return $result;
  } 
   public function update_register_password_first_step($password,$userid){
       $result = $this->execute("UPDATE users SET password='".$password."' WHERE userid='".$userid."'");
     return true; 
  }
  
  public function update_register_first_step($data,$userid){

      //echo "UPDATE users SET firstname='" . $data['firstname'] . "' , surname='" . $data['surname'] . "' , position='" . $data['position'] . "',telephone='" . $data['telephone'] . "', email='" . $data['email'] . "',organisation_name='" . $data['organisation_name'] . "',organisation_address='" . $data['organisation_address'] . "',organisation_tel='" . $data['organisation_tel'] . "',organisation_email='" . $data['organisation_email'] . "'   WHERE  userid='" . $userid . "' ";
      //exit;
      $result = $this->execute("UPDATE users SET firstname='" . $data['firstname'] . "' , surname='" . $data['surname'] . "' , position='" . $data['position'] . "',telephone='" . $data['telephone'] . "', email='" . $data['email'] . "',organisation_name='" . $data['organisation_name'] . "',organisation_address='" . $data['organisation_address'] . "',organisation_tel='" . $data['organisation_tel'] . "',organisation_email='" . $data['organisation_email'] . "',membership_level='" . $data['membership_level'] . "'   WHERE  userid='" . $userid . "' ");
      return $result;
  }
  public function update_register_secound_step($sdata,$userid){
     $result = $this->execute("UPDATE userextrainfo SET sec_firstname='" . $sdata['sec_firstname'] . "' , sec_surname='" . $sdata['sec_surname'] . "' , sec_position='" . $sdata['sec_position'] . "',sec_telephone='" . $sdata['sec_telephone'] . "', turnover_year='" . $sdata['turnover_year'] . "', turnover_amount='" . $sdata['turnover_amount'] . "',projected_budget='" . $sdata['projected_budget'] . "',postcode='" . $sdata['postcode'] . "',youngpeople='" . $sdata['youngpeople'] . "'  WHERE  userid='" . $userid . "' ");
      return $result; 
  }
  public function update_renewal_date($userid,$renewaldate){
     $result = $this->execute("UPDATE users SET renewaldate='".$renewaldate."' WHERE userid='".$userid."'");
     return true; 
  }
  
  public function select_amount_by_membership_level($membership_level){
       $result = $this->querynr("SELECT * FROM `settings` WHERE `key`='" . $membership_level. "'");
        return $result;
  }
  
 public function select_all_register_info($userid){
       $result = $this->querynr("SELECT users.*,userextrainfo.* FROM users,userextrainfo WHERE users.userid=userextrainfo.userid AND users.userid=".$userid);         
        return $result;
 } 
 public function select_admin_info(){
   $result = $this->querynr("SELECT * FROM adminusers WHERE status='1'");
   return $result;  
 }
 
 public function insert_log_with_payment($data){
     $result = $this->insert("INSERT INTO paymentlog (userid,payment_amount,payment_date,payment_log)" . "VALUES('$data[userid]','$data[payment_amount]','$data[payment_date]','$data[payment_log]')");
     return $result;
 }
 
 public function check_email_address_info($email){
   $result = $this->querynr("SELECT * FROM users WHERE email='".$email."'");
   return $result;  
 }
 
 public function update_forgot_password_info($data,$code){
       $result = $this->execute("UPDATE  users SET  password='" . $data['password'] . "' WHERE  postcode='" . $code. "' ");
       return $result;
 } 

public function select_key_for_payment(){
   $result = $this->querynr("SELECT * FROM `settings` ");
    $newresult = array();
        foreach ($result as $k => $v) {
            $newresult[$v['key']] = $v['val'];
        } 
    //print_r($newresult);
    //exit;
   return $newresult; 
}

public function select_key_info(){
 $result = $this->querynr("SELECT * FROM `settings` ");
    $newresult = array();
        foreach ($result as $k => $v) {
            $newresult[$v['key']] = $v['val'];
        } 
   return $newresult; 

}


 public function check_unique_email($email){  
   $result = $this->querynr("SELECT COUNT(*) as total FROM users WHERE email='".$email."'");
return $result[0]['total'];
 }

 public function check_unique_email_update($email, $userid){  
  $result = $this->querynr("SELECT COUNT(*) as total FROM users WHERE email='".$email."' AND userid!='".$userid."' ");
   return $result[0]['total'];
 }


public function update_postcode_by_userid($userid,$code){
    $result = $this->execute("UPDATE users SET postcode='".$code."' WHERE userid='".$userid."'");
    return true;  
 }

public function check_code_for_reset_password($code){
   $result = $this->querynr("SELECT * FROM users WHERE postcode='".$code."'");
   return $result;  
 }

public function get_email_settings(){
   $result = $this->querynr("SELECT val FROM `settings` WHERE `key`='email_from' OR `key`='email_from_name' ");

   $info=array();
   if($result){
     $info['email_from']= $result[0]['val'];
     $info['email_from_name']=$result[1]['val'];
}
   return $info; 
}


}


