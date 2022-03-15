<?php
class class_db{
    public function getList($tableNames,$columns,$where,$order_by){
        $connection = mysqli_connect("localhost","root","","college_db");
        $ret = array('status' => FALSE, 'message' => 'Error while selecting data.');
        if (!isset($tableNames) || trim($tableNames) == '') {
            $ret['message'] = 'Invalid tablename.';
            return $ret; }
        if (!isset($columns) || $columns == NULL) {
            $ret['message'] = 'Invalid columns.';
            return $ret; }
        $sql='select '.$columns.' from '.$tableNames;
        if(isset($tableNames) && $tableNames !='')
        { $sql=$sql.' WHERE '.$where; }    
        if(isset($order_by) && $order_by !='')
        { $sql=$sql.' ORDER BY  '.$order_by; } 
        // echo($sql);die();
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
        $res=mysqli_query($connection,$sql);
        if($res){
            $res = array('status' => TRUE, 'message' => 'Successfuly inserted data.');
            return $res;   
        }
        else
        { return $ret;}


    }
}
?>