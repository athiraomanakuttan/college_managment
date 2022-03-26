<?php
require_once( "model/models.php");
class class_course
{
    private $__tablename = 'courses';
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
    
    $column_name='`college_registration_id`, `course_dep`, `course_category`, `course_execution`, `course_code`, `course_name`, ';
    $values=$CLGID.',"'.$data['course_dep'].'","'.$data['course_category'].'","'.$data['course_execution'].'","'.$data['course_code'].'",'.$data['course_name'];
    $db=new class_db();
    $ret=$db->insert($this->__tablename,$column_name,$values);
    echo json_encode($ret);
    return $ret;
  }
}