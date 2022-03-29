<?php
require_once( "model/models.php");
class class_course
{
  private $__tablename='courses';
  public function getcourse($UID,$CLGID)
  {
      
   $ret = array('status' => FALSE, 'message' => 'Error Fetching data.');
   if($UID=='' || $UID==NULL || $CLGID=='' || $CLGID==NULL)
   {
     $ret = array('status' => FALSE, 'message' => 'Inalid user id or college id');
     echo json_encode($ret);
     return $ret;
   } 
   $column_name='`college_registration_id`, `course_dep`, `course_category`, `course_execution`, `course_code`, `course_name` ';
   $where='college_registration_id ='.$CLGID;
   $order_by='course_id desc';
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
        if($data[$i]['course_category']==1)
        {
            $course_category='Core Course';
        }
         elseif($data[$i]['course_category']==2)
        {
            $course_category='Common Course';
        }
        elseif($data[$i]['course_category']==3)
        {
            $course_category='Complementary Course';
        }
        if($data[$i]['course_execution']==1)
        {
            $course_exe='Theory';
        }
        elseif($data[$i]['course_execution']==2)
        {
            $course_exe='Pratical';
        }
        elseif($data[$i]['course_execution']==3)
        {
            $course_exe='Project';
        }
        elseif($data[$i]['course_execution']==4)
        {
            $course_exe='theory&pratical';
        }
        //  elseif($data[$i]['department_type']==2)
        // {
        //     $type='Non Teaching';
        // }
          // if($data[$i]['acadamic_year_status']==1)
          // {
          //     $status='<a id ="enable_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="disableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
          // }
          // elseif($data[$i]['acadamic_year_status']==0)
          // {
          //     $status='<a id ="disable_acdamic_year'.$data[$i]['acadamic_year_id'].'" onclick="enableAcadamicyr('.$data[$i]['acadamic_year_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
          // }
          $data[$i]['course_name']=ucfirst($data[$i]['course_name']);
          $output=$output.'<tr> 
          <th data-class="expand">'.$data[$i]['course_dep'].'</th> 
          <th data-class="expand">'.$data[$i]['course_name'].' </th>  
          <th data-class="expand">'.$course_category.'</th>   
          <th data-class="expand">'.$course_exe.'</th>  
          <th data-class="expand">'.$data[$i]['course_code'].'</th>  
          
        </tr> ';
      }
      $ret=array('status'=>TRUE,'data'=>$output);
      return  $ret;
  }
  public function AddCourse($UID,$CLGID,$data)
  {
    $ret=array('status'=>FALSE,'message'=>'Error while inserting data');
    if($UID=='' || $CLGID=='')
    {
    $ret=array('status'=>FALSE,'message'=>'invalid access');      
    echo json_encode($ret);
    return $ret;
    }
    else if($data['course_dep']=='' || $data['course_category']=='' || $data['course_execution']==''||$data['course_code']==''||$data['course_name']=='')
    {
    echo json_encode($ret);
    return $ret;
    }
    
    $column_name='`college_registration_id`, `course_dep`, `course_category`, `course_execution`, `course_code`, `course_name` ';
    $values=$CLGID.',"'.$data['course_dep'].'","'.$data['course_category'].'","'.$data['course_execution'].'","'.$data['course_code'].'","'.$data['course_name'].'"';
    
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    
    echo json_encode($ret);
    return $ret;
  }
}
?>