<?php
class class_programme
{
    private $__tablename='programmes';
    public function addprogramme($CLGID,$UID,$data)
    {
        $ret=array('status'=>FALSE,'message'=>'eroor while adding programmes');
        if($CLGID=='' || $UID=='')
        {
           echo json_encode($ret); return $ret;
        }
        elseif($data['programme_name']=='' || $data['programme_department']=='' || $data['programme_type']=='' || $data['programme_status']=='')
        {
            echo json_encode($ret); return $ret;
        }
    $column_name='`college_registration_id`,`user_login_id`,`programme_name`,`programme_department`,`programme_type`,`programme_status`';
    $values=$CLGID.','.$UID.',"'.$data['programme_name'].'",'.$data['programme_department'].','.$data['programme_type'].','.$data['programme_status'];
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    echo json_encode($ret);
    return $ret;

    }

}
?>