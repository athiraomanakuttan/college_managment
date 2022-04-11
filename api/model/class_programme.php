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
    public function getallprogrammes($CLGID)
    {
        $ret=array('status'=>FALSE,'message'=>'Error while adding programmes');
        if($CLGID=='')
        {
            echo json_encode($ret); return $ret;
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
        $column_name='`programme_id`,`programme_name`,`programme_department`,`programme_type`,`programme_status`,`department_name`';
        $table_name=$this->__tablename.' JOIN department on programmes.programme_department= department.department_id';
        $where='programmes.college_registration_id ='.$CLGID.' and programme_status in(0,1)';
        $order_by='programme_id desc LIMIT '.$start_from.','.$record_per_page;
        $db = new class_db();
        $ret = $db->getList($table_name,$column_name,$where,$order_by);
        if($ret['status'])
        {
            $displaydata=$ret['data']['rows'];
            $displaycount=$ret['data']['count'];
            $ret=$this->display_list($displaydata,$displaycount,$CLGID);
        }
        // echo($ret); 
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
        $table_name=$this->__tablename.' JOIN department on programmes.programme_department= department.department_id';
        $where='programmes.college_registration_id ='.$CLGID.' and programme_status in(0,1)';
        $order_by='programme_id desc';
        $db = new class_db();
        $counted = $db->getList($table_name,$column_name,$where,$order_by);
        $total_record=$counted['data']['rows'][0]['count'];
        $total_pages=ceil($total_record/$record_per_page);
        $output='';
        for($i=0; $i<$count; $i++)
        {
            if($data[$i]['programme_type']==1)
            {
                $type='UG';
            } elseif($data[$i]['programme_type']==2)
            {
                $type='PG';
            }
            

            if($data[$i]['programme_status']==1)
            {
                $status='<a id ="enable_programme'.$data[$i]['programme_id'].'" onclick="disableprogramme('.$data[$i]['programme_id'].')"><i class="fa fa-toggle-on text-primary" aria-hidden="true"></i></a>';
            }
            elseif($data[$i]['programme_status']==0)
            {
                $status='<a id ="disable_programme'.$data[$i]['programme_id'].'" onclick="enableprogramme('.$data[$i]['programme_id'].')"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>';
            }
            
            $output=$output.'<tr>  
            <th data-class="expand">'.$data[$i]['programme_name'].' </th>  
            <th data-class="expand">'.$data[$i]['department_name'].'</th>  
            <th data-class="expand">'.$type.'</th>   
            <th data-class="expand"><a id ="dele_programme'.$data[$i]['programme_id'].'" onclick="deleteprogramme('.$data[$i]['programme_id'].')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>  
            <th data-class="expand">'.$status.'</th>  
            <th data-class="expand"><a id ="dele_programme'.$data[$i]['programme_id'].'" onclick="editprogramme('.$data[$i]['programme_id'].')"><i class="fa-solid fa-pen-to-square"></i></a></th>  
          </tr> ';
        }
        $output=$output.'';
        $pagination="";
    $pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="1" onclick="getprogramme(1)">1</span>';

if($page<3)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="2" onclick="getprogramme(2)">2</span>';
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="3" onclick="getprogramme(3)">3</span>';
if($total_pages>3){
    $pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$total_pages.'" onclick="getprogramme('.$total_pages.')">'.$total_pages.'</span>';

}
}
elseif($page-3>3 and $page+3<$total_pages)
{
for($i=$page-3;$i<=$page+3;$i++)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$i.'" onclick="getprogramme('.$i.')">'.$i.'</span>';

}
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$total_pages.'" onclick="getprogramme('.$total_pages.')">'.$total_pages.'</span>';
}
else
{
 for($i=2;$i<=$total_pages;$i++)
{
$pagination=$pagination.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$i.'" onclick="getprogramme('.$i.')">'.$i.'</span>';

}
}
// $output=$output.'<span class="pagination_link" style="cursor:pointer; padding:6px;border:1px solid black;" id="'.$total_pages.'" onclick="getprogramme('.$total_pages.')">'.$total_pages.'</span>';

    ///////////////////
        $ret=array('status'=>TRUE,'data'=>$output,'pagination'=>$pagination);
        return  $ret;
    }

public function ChangestatusProgramme($CLGID,$data)
{
     $ret=array('status'=>FALSE,'message'=>'error while updating status');
        if($CLGID==''){
            echo json_encode($ret);
            return $ret;
        }
        elseif($data['programme_id']=='' || $data['programme_status']=='')
        {
            echo json_encode($ret);
            return $ret;
        }
        $column_name='programme_status';
        $values=$data['programme_status'];
        $where='programme_id='.$data['programme_id'];
        $db= new class_db();
        $ret=$db->update($this->__tablename,$column_name,$values,$where);
        echo json_encode($ret);
        return $ret;
}
public function updateProgramme($CLGID,$data)
{
    
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='' || $data['programme_id']=='')
    {
        echo json_encode($ret);
        return $ret;
    }
     $column_name='`programme_id`,`programme_name`,`programme_department`,`programme_type`,`programme_status`,`department_id`';
     $table_name=$this->__tablename.' JOIN department on programmes.programme_department= department.department_id';
     $where='programmes.`college_registration_id` ='.$CLGID.' and `programme_id` ='.$data['programme_id'];
     $db = new class_db();
     $ret = $db->getList($table_name,$column_name,$where);
     echo json_encode($ret);
     return $ret;
}
public function updatingprogramme($CLGID,$data)
{
    
    $ret=array('status'=>FALSE,'message'=>'Error while updating data');
    if($CLGID=='')
    {
        echo json_encode($ret); return $ret;
    }
    elseif($data['programme_id']=='' || $data['programme_name']=='' || $data['programme_department']=='' || $data['programme_type']=='' || $data['programme_status']=='' ){
        echo json_encode($ret); return $ret;
    }
    $column_name=array("programme_name","programme_department","programme_type");
    $values=array('"'.$data['programme_name'].'"',$data['programme_department'],$data['programme_type']);
    $where='programme_id='.$data['programme_id'].' and `college_registration_id` ='.$CLGID;
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