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
     $record_per_page=10; $page=0;
        if(isset($_POST['page_no']))
        {
          $page=$_POST['page_no'];
        }
        else
        {
         $page=1;
        }
        $start_from=($page-1) * $record_per_page;
     $column_name='`department_id`,`department_name`,`department_nature`,`department_type`,`department_status`';
     $where='college_registration_id ='.$CLGID.' and department_status in(0,1)';
     $order_by='department_id desc LIMIT '.$start_from.','.$record_per_page;
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where,$order_by);
     if($ret['status'])
     {
       
       $displaydata=$ret['data']['rows'];
       $displaycount=$ret['data']['count'];
      $ret=$this->display_list($displaydata,$displaycount,$CLGID);
     }
     echo json_encode($ret);
     return $ret;
  
    }
      public function display_list($data,$count,$CLGID)
    {
        $ret=array('status'=>FALSE,'message'=>'error while display data');
        if($data=='' || $count=='')
        {
            return $ret;
        }
        $record_per_page=10; $page=0;
        if(isset($_POST['page_no']))
        {
          $page=$_POST['page_no'];
        }
        else
        {
         $page=1;
        }
        $column_name='count(*) AS count';
        $where='college_registration_id ='.$CLGID.' and department_status in(0,1)';
        $order_by='department_id desc';
        $db = new class_db();
        $counted = $db->getList($this->__tablename,$column_name,$where,$order_by);
        $total_record=$counted['data']['rows'][0]['count'];
        $total_pages=ceil($total_record/$record_per_page);
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

            if($data[$i]['department_status']==1)
            {
                $status='<a id ="enable_department'.$data[$i]['department_id'].'" onclick="disabledepartment('.$data[$i]['department_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
            }
            elseif($data[$i]['department_status']==0)
            {
                $status='<a id ="disable_department'.$data[$i]['department_id'].'" onclick="enabledepartment('.$data[$i]['department_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
            }
            
            $output=$output.'<tr>  
            <th data-class="expand">'.$data[$i]['department_name'].' </th>  
            <th data-class="expand">'.$nature.'</th>  
            <th data-class="expand">'.$type.'</th>   
            <th data-class="expand"><a id ="dele_department'.$data[$i]['department_id'].'" onclick="deletedepartment('.$data[$i]['department_id'].')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>  
            <th data-class="expand">'.$status.'</th>  
            <th data-class="expand"><a id ="dele_department'.$data[$i]['department_id'].'" onclick="editdepartment('.$data[$i]['department_id'].')"><i class="fa-solid fa-pen-to-square"></i></a></th>  
          </tr> ';
        }
        $pagination="";
    $pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="1" onclick="getdepartments(1)">1</span>';

if($page<3)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="2" onclick="getdepartments(2)">2</span>';
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="3" onclick="getdepartments(3)">3</span>';
if($total_pages>3){
    $pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$total_pages.'" onclick="getdepartments('.$total_pages.')">'.$total_pages.'</span>';

}
}
elseif($page-3>3 and $page+3<$total_pages)
{
for($i=$page-3;$i<=$page+3;$i++)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$i.'" onclick="getdepartments('.$i.')">'.$i.'</span>';

}
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$total_pages.'" onclick="getdepartments('.$total_pages.')">'.$total_pages.'</span>';
}
else
{
 for($i=2;$i<=$total_pages;$i++)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$i.'" onclick="getdepartments('.$i.')">'.$i.'</span>';

}
}
        $ret=array('status'=>TRUE,'data'=>$output,'pagination'=>$pagination);
        return  $ret;
    }
    function changeStatus($UID,$data)
    {
        $ret=array('status'=>FALSE,'message'=>'error while updating status');
        if($UID=='' || $data==''){
            echo json_encode($ret);
            return $ret;
        }
        elseif($data['department_id']=='' || $data['department_status']=='')
        {
            echo json_encode($ret);
            return $ret;
        }
        $column_name='department_status';
        $values=$data['department_status'];
        $where='department_id='.$data['department_id'];
        $db= new class_db();
        $ret=$db->update($this->__tablename,$column_name,$values,$where);
        echo json_encode($ret);
        return $ret;

    }
public function updatedepartment($CLGID,$data)
  {
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='' || $data['department_id']=='')
    {
        echo json_encode($ret);
        return $ret;
    }
    $column_name='`college_registration_id`,`user_login_id`,`department_name`,`department_nature`,`department_type`,`department_status`';
     $where='`college_registration_id` ='.$CLGID.' and `department_id` ='.$data['department_id'];
     $db = new class_db();
     $ret = $db->getList($this->__tablename,$column_name,$where);
     echo json_encode($ret);
     return $ret;
    } 
public function updatingdepartment($CLGID,$data)
{
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='')
    {
        echo json_encode($ret); return $ret;
    }
    elseif($data['department_id']=='' || $data['department_name']=='' || $data['department_nature']=='' || $data['department_type']=='' || $data['department_status']=='' ){
        echo json_encode($ret); return $ret;
    }
    $column_name=array("department_name","department_nature","department_type");
    $values=array('"'.$data['department_name'].'"',$data['department_nature'],$data['department_type']);
    $where='department_id='.$data['department_id'].' and `college_registration_id` ='.$CLGID;
    for($i=0; $i<count($column_name);$i++)
    {
        $db= new class_db();
        $ret=$db->update($this->__tablename,$column_name[$i],$values[$i],$where);
    }
    echo json_encode($ret);
    return $ret;
}  
public function GetallDepartment($CLGID)
{
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID==''){
        echo json_encode($ret); return $ret;
    }
    $column_name='`department_id`,`department_name`';
    $where='college_registration_id ='.$CLGID.' and department_status in(1) and department_type=1';
    $db= new class_db();
    $ret=$db->getList($this->__tablename,$column_name,$where);
    echo json_encode($ret);
    return $ret;
}     
}
?>