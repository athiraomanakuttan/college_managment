<?php
require_once( "model/models.php");
require_once( "db/connection.php");
if($_POST['action']!='userlogin'){
$UID=$_SESSION['UID'];
$CLGID=$_SESSION['CLGID']; }
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
            $user = new class_userlogin();
             $ret = $user->UserLogin($data); 
             return true;
            break;
        case 'AddAcadamicYear':
            $acadamic = new class_acadamicyear();
             $ret = $acadamic->AddAcadamicYear($UID,$CLGID,$data);
             return true;
            break;
        default :
            echo("invalid action");
            die();    
        } 
        //print_r($ret);die;
        //return true;          
?>