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
   $column_name='`college_registration_id`,`course_id`, `course_dep`, `course_category`, `course_execution`, `course_code`, `course_name` ,`status` ';
   $where='college_registration_id ='.$CLGID.' and status in(0,1)';
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
        
      //  var_dump($data[$i]['status']);exit();
      if($data[$i]['status']==1)
      {
          $status='<a id ="enable_course'.$data[$i]['course_id'].'" onclick="disablecourse('.$data[$i]['course_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
      }
      elseif($data[$i]['status']==0)
      {
          $status='<a id ="disable_course'.$data[$i]['course_id'].'" onclick="enablecourse('.$data[$i]['course_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
      }
          $data[$i]['course_name']=ucfirst($data[$i]['course_name']);
          $output=$output.'<tr> 
          <th data-class="expand">'.$data[$i]['course_dep'].'</th> 
          <th data-class="expand">'.$data[$i]['course_name'].' </th>  
          <th data-class="expand">'.$course_category.'</th>   
          <th data-class="expand">'.$course_exe.'</th>  
          <th data-class="expand">'.$data[$i]['course_code'].'</th>
          <th data-class="expand" ><a id ="dele_course'.$data[$i]['course_id'].'" onclick="deletecourse('.$data[$i]['course_id'].')"><i class="fa fa-trash-o" aria-hidden="true" title="Delete"></i></a></th>  
          <th data-class="expand">'.$status.'</th>  
          <th data-class="expand"><a id ="dele_course'.$data[$i]['course_id'].'" onclick="editcourse('.$data[$i]['course_id'].')"><i class="fa-solid fa-pen-to-square"></i></a></th>     
          
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
  public function ChangestatusCourse($CLGID,$data)
{
  
     $ret=array('status'=>FALSE,'message'=>'error while updating status');
        if($CLGID==''){
            echo json_encode($ret);
            return $ret;
        }
        elseif($data['course_id']=='' || $data['status']=='')
        {
            echo json_encode($ret);
            return $ret;
        }
        $column_name='status';
        $values=$data['status'];
        $where='course_id='.$data['course_id'];
        $db= new class_db();
        $ret=$db->update($this->__tablename,$column_name,$values,$where);
        echo json_encode($ret);
        return $ret;
}
public function updatecourse($CLGID,$data)
{
    
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='' || $data['course_id']=='')
    {
        echo json_encode($ret);
        return $ret;
    }
    $column_name='`course_id`, `course_dep`, `course_category`, `course_execution`, `course_code`, `course_name` ,`status`,`department_id` ';
     $table_name=$this->__tablename.' JOIN department on courses.course_dep= department.department_id';
    
    
     $where='courses.`college_registration_id` ='.$CLGID.' and `course_id` ='.$data['course_id'];
     $db = new class_db();
     $ret = $db->getList($table_name,$column_name,$where);
   
     echo json_encode($ret);
     return $ret;
}
public function updatingCourse($CLGID,$data)
{
   
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='')
    {
        echo json_encode($ret); return $ret;
    }
    elseif($data['course_id']=='' ||$data['course_dep']=='' || $data['course_category']=='' || $data['course_execution']=='' || $data['course_code']=='' || $data['course_name']==''|| $data['status']=='' ){
        echo json_encode($ret); return $ret;
    } 
    $column_name=array("course_dep","course_category","course_execution","course_code","course_name");
    $values=array($data['course_dep'],$data['course_category'],$data['course_execution'],'"'.$data['course_code'].'"','"'.$data['course_name'].'"');
    $where='course_id='.$data['course_id'].' and `college_registration_id` ='.$CLGID;
    
    for($i=0; $i<count($column_name);$i++)
    {
        $db= new class_db();
        $ret=$db->update($this->__tablename,$column_name[$i],$values[$i],$where);
        
    }
    
    echo json_encode($ret);
    return $ret;
}
}
?>