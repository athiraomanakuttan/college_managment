<?php

class class_college
{
    private $__tablename='college_registration';
    public function addNewCollege($data)
    {
         $ret = array('status' => FALSE, 'message' => 'Error while adding college.');
       
        if(!isset($data['collge_name']) ||  $data['collge_name']=='')
        {return $ret;}
        elseif(!isset($data['collge_address']) ||  $data['collge_address']=='')
        {return $ret;}
        elseif(!isset($data['college_phone_no']) ||  $data['college_phone_no']=='')
        {return $ret; }
        elseif(!isset($data['college_email']) ||  $data['college_email']=='')
        {return $ret; }
        elseif(!isset($data['college_pwd']) ||  $data['college_pwd']=='')
        {return $ret; }
        $columns='`college_registration_name`,`college_registration_address`, `college_registration_phone_number`, `college_registration_emailid`, `college_registration_password`, `college_registration_status`';
        $values=$data['collge_name'].','.$data['collge_address'].','.$data['college_phone_no'].','.$data['college_email'].','.$data['college_pwd'].",1";
        $db=new class_db();
        $ret=$db->insert($this->__tablename,$columns,$values);

    }
}
?>