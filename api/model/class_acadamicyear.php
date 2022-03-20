<?php
require_once( "model/models.php");
class class_acadamicyear
{
  private $__tablename = 'acadamic_year';
  public function GetAcadamicYearList($UID,$CLGID)
  {
     $ret = array('status' => FALSE, 'message' => 'Error Fetching data.');
     if($UID=='' || $UID==NULL || $CLGID=='' || $CLGID==NULL)
     {
       $ret = array('status' => FALSE, 'message' => 'Inalid user id or colege id');
       return $ret;
     } 
     $column_name='`acadamic_year_id`,`acadamic_year_name`,`acadamic_year_start_date`,
                  `acadamic_year_end_date`,`college_registration_id`,`user_login_id`,
                  `acadamic_year_timestamp`,`acadamic_year_status`';
     $where='college_registration_id ='.$CLGID.' and user_login_id='.$UID;
     $order_by='acadamic_year_id';
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
     echo json_encode($ret);
     return $ret;
  }
  

  public function AddAcadamicYear($UID,$CLGID,$data)
  {
    $ret=array('status'=>FALSE,'message'=>'Error while inserting data');
    if($UID=='' || $CLGID=='')
    {
    $ret=array('status'=>FALSE,'message'=>'invalid access');      
    echo json_encode($ret);
    return $ret;
    }
    else if($data['acadamic_name']=='' || $data['acadamic_start_date']=='' || $data['acadamic_end_date']==''||$data['acadamic_status']=='')
    {
    echo json_encode($ret);
    return $ret;
    }
    $column_name='`college_registration_id`,`user_login_id`,`acadamic_year_name`,`acadamic_year_desc`,`acadamic_year_start_date`,`acadamic_year_end_date`,`acadamic_year_status`';
    $values=$CLGID.','.$UID.',"'.$data['acadamic_name'].'","'.$data['acadamic_desc'].'","'.$data['acadamic_start_date'].'","'.$data['acadamic_end_date'].'",'.$data['acadamic_status'];
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    echo json_encode($ret);
    return $ret;
  }
}
?>