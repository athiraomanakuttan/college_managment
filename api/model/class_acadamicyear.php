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
     $column_name='`acadamic_year_id`,`acadamic_year_name`,`acadamic_year_desc`,`acadamic_year_start_date`,
                  `acadamic_year_end_date`,`college_registration_id`,`user_login_id`,
                  `acadamic_year_timestamp`,`acadamic_year_status`';
     $where='college_registration_id ='.$CLGID.' and user_login_id='.$UID.' and acadamic_year_status in(0,1,2)';
     $order_by='acadamic_year_id';
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
    //  if($ret['status'])
    //  {
       
    //    $displaydata=$ret['data']['rows'];
    //    $displaycount=$ret['data']['count'];
    //   $ret=$this->display_list($displaydata,$displaycount);
    //  }
     echo json_encode($ret);
     return $ret;
  }
      public function display_list($data,$count)
    {
        $ret=array('status'=>FALSE,'message'=>'error while display data');
        if($data=='' || $count=='')
        {
            return $ret;
        }
        $output='';
        for($i=0; $i<$count; $i++)
        {
            if($data[$i]['acadamic_year_status']==1)
            {
                $status='<a id ="enable_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="disableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
            }
            elseif($data[$i]['acadamic_year_status']==0)
            {
                $status='<a id ="disable_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="enableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
            }
            $data[$i]['acadamic_year_name']=ucfirst($data[$i]['acadamic_year_name']);
            $output=$output.'<tr>  
            <th data-class="expand">'.$data[$i]['acadamic_year_name'].' </th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_desc'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_start_date'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_end_date'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_id'].'</th>  
            <th data-class="expand"><a id ="dele_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="deleteAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>  
            <th data-class="expand">'.$status.'</th>  
            <th data-class="expand"><a id ="dele_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="editAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa-solid fa-pen-to-square"></i></a></th>  
          </tr> ';
        }
        $ret=array('status'=>TRUE,'data'=>$output);
        return  $ret;
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
    if($data['acadamic_status']==1)
    {
      $column_name='acadamic_year_status';
      $values='0';
      $where= ' college_registration_id ='.$CLGID.' and  acadamic_year_status=1';
      $db=new class_db();
      $ret=$db->update($this->__tablename,$column_name,$values,$where);
    }
    $column_name='`college_registration_id`,`user_login_id`,`acadamic_year_name`,`acadamic_year_desc`,`acadamic_year_start_date`,`acadamic_year_end_date`,`acadamic_year_status`';
    $values=$CLGID.','.$UID.',"'.$data['acadamic_name'].'","'.$data['acadamic_desc'].'","'.$data['acadamic_start_date'].'","'.$data['acadamic_end_date'].'",'.$data['acadamic_status'];
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    echo json_encode($ret);
    return $ret;
  }
  public function changestatusAcadamicYear($UID,$CLGID,$data)
  {
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($UID==''|| $CLGID==''|| $data['acadamic_year_id']==''|| $data['acadamic_year_status']=='' )
   {
    echo json_encode($ret);
    return $ret;
    }
    
    if($data['acadamic_year_status']==1){
    $column_name='acadamic_year_status';
    $values='0';
    $where= ' college_registration_id ='.$CLGID.' and  acadamic_year_status=1';
    $db=new class_db();
    $ret=$db->update($this->__tablename,$column_name,$values,$where);
    }
    $column_name='acadamic_year_status';
    $values=$data['acadamic_year_status'];
    $where= 'acadamic_year_id ='.$data['acadamic_year_id'];
    $db=new class_db();
    $ret=$db->update($this->__tablename,$column_name,$values,$where);
    echo json_encode($ret);
    return $ret;
    
  }
  public function selectAcademic($CLGID,$data)
  {
    // var_dump($data);exit;
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='' || $data['acadamic_year_id']=='')
    {
        echo json_encode($ret);
        return $ret;
    }
    $column_name='`college_registration_id`,`user_login_id`,`acadamic_year_name`,`acadamic_year_desc`,`acadamic_year_start_date`,`acadamic_year_end_date`,`acadamic_year_status`';
    $where='`college_registration_id` ='.$CLGID.' and `acadamic_year_id` ='.$data['acadamic_year_id'];
    $db = new class_db();
    $ret = $db->getList($this->__tablename,$column_name,$where);
    echo json_encode($ret);
    return $ret;
  }
  public function updateacademic($CLGID,$data)
  {
    // var_dump($data);exit;
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='')
    {
        echo json_encode($ret); return $ret;
    }
    elseif($data['acadamic_year_id']=='' || $data['acadamic_year_name']=='' || $data['acadamic_year_desc']=='' || $data['acadamic_year_start_date']=='' || $data['acadamic_year_end_date']=='' || $data['acadamic_year_status']=='' ){
      echo json_encode($ret); return $ret;
  }
  $column_name=array("acadamic_year_name","acadamic_year_desc","acadamic_year_start_date","acadamic_year_end_date",);
  $values=array('"'.$data['acadamic_year_name'].'"',$data['acadamic_year_desc'],$data['acadamic_year_start_date'],$data['acadamic_year_end_date']);
  $where='acadamic_year_id='.$data['acadamic_year_id'].' and `college_registration_id` ='.$CLGID;
  for($i=0; $i<count($column_name);$i++)
  {
      $db= new class_db();
      $ret=$db->update($this->__tablename,$column_name[$i],$values[$i],$where);
      // var_dump($ret);
  }
  echo json_encode($ret);
  return $ret;
  }
  
  
   
}
?>