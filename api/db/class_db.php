<?php
class class_db{

    public function getList($tableNames,$columns,$where=null,$order_by= null){

    
        $connection = mysqli_connect("localhost","root","","college_db");
        $ret = array('status' => FALSE, 'message' => 'Error while selecting data.');
        if (!isset($tableNames) || trim($tableNames) == '') {
            $ret['message'] = 'Invalid tablename.';
            return $ret; }
        if (!isset($columns) || $columns == NULL) {
            $ret['message'] = 'Invalid columns.';
            return $ret; }
        $sql='select '.$columns.' from '.$tableNames;
        
        if(isset($where) && $where !='')
        { $sql=$sql.' WHERE '.$where; }    
        if(isset($order_by) && $order_by !='')
        { $sql=$sql.' ORDER BY  '.$order_by; } 
        // echo($sql); echo('</br>');
        $res=mysqli_query($connection,$sql);
        
        if($res){ 
            // echo("success"); die();
            $rows=array();
            while($row=mysqli_fetch_assoc($res)){
                $rows[]=$row; }
            $row_count=count($rows); 
            $res = array('status' => TRUE, 'message' => 'Successfuly selected the data.',
                'data'=>array('count'=>$row_count,'rows'=>$rows));
            return $res;   
        }
        else
        {
            // echo("not success"); die();
 return $ret; }
            
    }
    public function insert($tablename,$columns,$values)
    { 
        $connection = mysqli_connect("localhost","root","","college_db");
        $ret = array('status' => FALSE, 'message' => 'Error while selecting data.');
        if (!isset($tablename) || trim($tablename) == '') {
            $ret['message'] = 'Invalid tablename.';
            return $ret; }
        if (!isset($columns) || trim($columns) == '') {
            $ret['message'] = 'Invalid columns.';
            return $ret; }
        if (!isset($values) || trim($values) == '') {
            $ret['message'] = 'Invalid column values.';
            return $ret; }
        $sql='insert into '.$tablename.'('.$columns.') values ('.$values.')';

        // echo($sql); 
        // echo($sql); die();

        $res=mysqli_query($connection,$sql);
        
        if($res){
            $res = array('status' => TRUE, 'message' => 'Successfuly inserted data.');
            return $res;   
        }
        else
        { return $ret;}


    }
    public function update($tablename,$columns,$values,$where)
    {
        $connection = mysqli_connect("localhost","root","","college_db");
        $ret = array('status' => FALSE, 'message' => 'Error while updating data.');
        if($tablename=='' || $columns=='' || $values=='' || $where=='')
        {
            echo json_encode($ret);
            return $ret;
        }
        // var_dump("insieddefeey"); die();
        $sql='UPDATE '.$tablename.' SET '.$columns.'='.$values.' WHERE '.$where;
        // echo($sql);echo('<br>'); die();
        $res=mysqli_query($connection,$sql);
        if($res){
            $res = array('status' => TRUE, 'message' => 'Successfuly updated data.');
            return $res;   
        }
        else
        { return $ret;}

    }

}
?>