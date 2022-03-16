<?php
class class_userlogin
{
  private $__tablename='user_login';
  public function UserLogin($data)
 {
    $ret=array('status' => FALSE, 'message' => 'Error while adding college.');
    if(!isset($data['login_email']) || $data['login_email']=='')
    { return $ret; }
    elseif(!isset($data['login_password']) || $data['login_password']=='')
    { return $ret; }
    $column_name='*';
    //  $where='user_login_emailid='.$data['login_email'].' and user_login_password='.$data['login_password'];
     
    //  $db = new class_db();
    //  $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
    //  var_dump($ret);


 }
}
?>