<?php
require_once( "model/models.php");
require_once( "db/connection.php");
$UID=$_SESSION['UID'];
$CLGID=$_SESSION['CLGID'];
if(!$_POST['action'])
{echo("no action"); die();}
else{ $action=$_POST['action']; }
switch ($action) {

        /*Lookup */
        case 'GetAcadamicYear':
            $acadamic = new class_acadamicyear();
            $ret = $acadamic->GetAcadamicYearList($UID,$CLGID);
            // var_dump($ret);
            return $ret;
            break;
        case 'getcollegedata':
            $acadamic = new class_college();
            $ret = $acadamic->GetCollegeDetails($UID,$CLGID);
            return $ret;
            break;
        case 'GetDepartment':
            $department = new class_department();
            $ret = $department->GetDepartmentDetails($UID,$CLGID);
            return $ret;
            break;
        case 'getallcourse':
            $course = new class_course();
            $ret = $course->Getcourse($UID,$CLGID);
            return $ret;
            break;
           
        case 'GetallDepartment':
            $department = new class_department();
            $ret = $department->GetallDepartment($CLGID);
            return $ret;
            break;
        case 'getallprograme':
            $programme=new class_programme();
            $ret=$programme->getallprogrammes($CLGID);
            return $ret;
            break;
        default :
            echo("invalid action");
            die();    
        }            
?>