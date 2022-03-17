<?php
require_once( "model/models.php");
class class_loginlog
{
 private $__tablename='user_login_log';
 public function AddLoginLog()
 {
     $rek=array('status'=>FALSE,'message'=>'Error while inserting login log');
     if(!isset($_SESSION['CLGID']) || !isset($_SESSION['UID']))
     { return $rek;}
    else
    {
      $column='`college_registration_id`,`user_login_log_user_id`';
      $values=$_SESSION['CLGID'].",".$_SESSION['UID'];
      $db=new class_db();
      $rek=$db->insert($this->__tablename,$column,$values);
      return $rek;
    }
    return $rek;
 }
 
}
?>