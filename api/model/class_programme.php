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
        $ret=array('status'=>FALSE,'message'=>'eroor while adding programmes');
        if($CLGID=='')
        {
            echo json_encode($ret); return $ret;
        }
        $column_name='`programme_id`,`programme_name`,`programme_department`,`programme_type`,`programme_status`,`department_name`';
        $table_name=$this->__tablename.' JOIN department on programmes.programme_department= department.department_id';
        $where='programmes.college_registration_id ='.$CLGID.' and programme_status in(0,1)';
        $order_by='programme_id desc';
        $db = new class_db();
        $ret = $db->getList($table_name,$column_name,$where,$order_by);
        if($ret['status'])
        {
            $displaydata=$ret['data']['rows'];
            $displaycount=$ret['data']['count'];
            $ret=$this->display_list($displaydata,$displaycount);
        }
        // echo($ret); 
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
        $ret=array('status'=>TRUE,'data'=>$output);
        return  $ret;
    }


}
?>