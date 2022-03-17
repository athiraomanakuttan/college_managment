<?php
require_once( "model/models.php");
require_once( "db/connection.php");
$UID=1;
$CLGID=1;
$data = $_REQUEST['data'];
if(!$_POST['action'])
{echo("no action"); die();}
else{ $action=$_POST['action']; }
switch ($action) {
        case 'addCollege':
            $college = new class_college();
            $ret = $college->addNewCollege($data);
            //return $ret;
            break;
        case 'userlogin':
            $college = new class_userlogin();
             $ret = $college->UserLogin($data); //print_r($ret);die;
             return true;
            break;
        default :
            echo("invalid action");
            die();    
        } 
        //print_r($ret);die;
        //return true;          
?>