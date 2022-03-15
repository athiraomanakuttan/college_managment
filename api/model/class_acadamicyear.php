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
                  `acadamic_year_end_date`,`acadamic_year_colege_id`,`acadamic_year_user_id`,
                  `acadamic_year_timestamp`,`acadamic_year_status`';
     $where='acadamic_year_colege_id='.$CLGID.' and acadamic_year_user_id='.$UID;
     $order_by='acadamic_year_id';
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
     var_dump($ret);
     return $ret;
  }
}
?>