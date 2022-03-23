<?php 
require_once( "model/models.php");
class class_department
{
    private $__tablename = 'department';
    public function AddDepartment($UID,$CLGID,$data)
    {
        $ret=array('status'=>FALSE,'message'=>'eroor while adding data');
        if($UID=='' || $CLGID==''){ echo json_encode($ret); return $ret;}
        elseif($data['department_name']=='' || $data['department_nature']=='' || $data['department_type']=='' || $data['department_status']=='' ){
            echo json_encode($ret); return $ret;
        }
    $column_name='`college_registration_id`,`user_login_id`,`department_name`,`department_nature`,`department_type`,`department_status`';
    $values=$CLGID.','.$UID.',"'.$data['department_name'].'","'.$data['department_nature'].'","'.$data['department_type'].'","'.$data['department_status'].'"';
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    echo json_encode($ret);
    return $ret;
    }
    public function GetDepartmentDetails($UID,$CLGID)
    {
        
     $ret = array('status' => FALSE, 'message' => 'Error Fetching data.');
     if($UID=='' || $UID==NULL || $CLGID=='' || $CLGID==NULL)
     {
       $ret = array('status' => FALSE, 'message' => 'Inalid user id or colege id');
       echo json_encode($ret);
       return $ret;
     } 
     $column_name='`department_id`,`department_name`,`department_nature`,`department_type`,`department_status`';
     $where='college_registration_id ='.$CLGID.' and user_login_id='.$UID.' and department_status in(0,1)';
     $order_by='department_id desc';
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
     if($ret['status'])
     {
       
       $displaydata=$ret['data']['rows'];
       $displaycount=$ret['data']['count'];
      $ret=$this->display_list($displaydata,$displaycount);
     }
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
            if($data[$i]['department_nature']==1)
            {
                $nature='Aided';
            } elseif($data[$i]['department_nature']==2)
            {
                $nature='Sele finance';
            }
            if($data[$i]['department_type']==1)
            {
                $type='Teaching';
            } elseif($data[$i]['department_type']==2)
            {
                $type='Non Teaching';
            }

            if($data[$i]['department_nature']==1)
            {
                $status='<a id ="enable_sender_id_'.$data[$i]['acadamic_year_id'].'" onclick="disableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
            }
            elseif($data[$i]['department_nature']==0)
            {
                $status='<a id ="disable_sender_id_'.$data[$i]['acadamic_year_id'].'" onclick="enableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
            }
            
            $output=$output.'<tr>  
            <th data-class="expand">'.$data[$i]['acadamic_year_name'].' </th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_desc'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_start_date'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_end_date'].'</th>  
            <th data-class="expand">'.$data[$i]['acadamic_year_id'].'</th>  
            <th data-class="expand"><a id ="dele_sender_id_'.$data[$i]['acadamic_year_id'].'" onclick="deleteAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>  
            <th data-class="expand">'.$status.'</th>  
            <th data-class="expand"><a id ="dele_sender_id_'.$data[$i]['acadamic_year_id'].'" onclick="editAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa-solid fa-pen-to-square"></i></a></th>  
          </tr> ';
        }
        $ret=array('status'=>TRUE,'data'=>$output);
        return  $ret;
    }
}
?>