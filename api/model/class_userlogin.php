<?php
require_once( "model/models.php");
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
    $column_name='`college_registration_id`,`user_login_id`,`user_login_role_id`';
    $where='user_login_emailid="'.$data['login_email'].'" and user_login_password="'.$data['login_password'].'"';
    $db = new class_db();
    $ret = $db->getList($this->__tablename,$column_name,$where);
    if($ret['status'] && $ret['data']['count']>0)
    {
        $college_registration_id=$ret['data']['rows'][0]['college_registration_id'];
        $user_login_id=$ret['data']['rows'][0]['user_login_id'];
        $role=$ret['data']['rows'][0]['user_login_role_id'];
        $_SESSION['CLGID']=$college_registration_id;
        $_SESSION['UID']=$user_login_id;
        if(isset($_SESSION['CLGID'])){
        $loginlog= new class_loginlog();
        $rek=$loginlog->AddLoginLog();   
    }
    echo json_encode($ret);
    // echo($ret);
        return $ret;
    }
    else
    {
        // var_dump("not");
        $ret=array('status' => FALSE, 'message' => 'Not a registred user');
        echo json_encode($ret);
        return $ret;
    }
      

    


 }
}
?>