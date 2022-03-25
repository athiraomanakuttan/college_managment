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
             return $ret;
            break;
        case 'AddAcadamicYear':
            $acadamic = new class_acadamicyear();
             $ret = $acadamic->AddAcadamicYear($UID,$CLGID,$data);
             return $ret;
            break;
        case 'AddDepartment':
            $department = new class_department();
             $ret = $department->AddDepartment($UID,$CLGID,$data);
             return $ret;
            break;
        case 'changestatusAcadamicYear':
                $changestatusAcadamicYear = new class_acadamicyear();
                $ret = $changestatusAcadamicYear->changestatusAcadamicYear($UID,$CLGID,$data);
                return $ret;
                break;
        case 'ChangestatusDepartment':
            $department = new class_department();
             $ret = $department->changeStatus($UID,$data);
             return $ret;
            break;  
        case 'updateDepartment':
            $updatedepartment = new class_department();
             $ret = $updatedepartment->updatedepartment($CLGID,$data);
             return $ret;
            break;
        default :
            echo("invalid action");
            die();    
        } 
        //print_r($ret);die;
        //return true;          
?>