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
            $department = new class_department();
             $ret = $department->updatedepartment($CLGID,$data);
             return $ret;
            break; 
        case 'updatingdepartment':
            $department = new class_department();
             $ret = $department->updatingdepartment($CLGID,$data);
             return $ret;
            break; 
         case 'selectAcademic':
                $selectAcademic = new class_acadamicyear();
                $ret = $selectAcademic->selectAcademic($CLGID,$data);
                 return $ret;
                break;
        case 'updateacademic':
                    $updateacademic = new class_acadamicyear();
                    $ret = $updateacademic->updateacademic($CLGID,$data);
                    return $ret;
                    break;   
         case 'AddCourse':
            $AddCourse = new class_course();
            $ret = $AddCourse->AddCourse($UID,$CLGID,$data);
            return $ret;
            break;   

        case 'addprogramme':
            $programme=new class_programme();
            $ret=$programme->addprogramme($CLGID,$UID,$data);
            return $ret;
            break;
        case 'ChangestatusProgramme':
            $programme=new class_programme();
            $ret=$programme->ChangestatusProgramme($CLGID,$data);
            return $ret;
            break;     
        case 'updateProgramme':
            $programme=new class_programme();
            $ret=$programme->updateProgramme($CLGID,$data);
            return $ret;
            break;     
        case 'updatingprogramme':
            $programme=new class_programme();
            $ret=$programme->updatingprogramme($CLGID,$data);
            return $ret;
            break;
        case 'ChangestatusCourse':
            $course=new class_course();
            $ret=$course->ChangestatusCourse($CLGID,$data);
            return $ret;
             break;
        case 'updatecourse':
                $course=new class_course();
                $ret=$course->updatecourse($CLGID,$data);
                return $ret;
                break;
         case 'updatingCourse':
                    $course=new class_course();
                    $ret=$course->updatingCourse($CLGID,$data);
                    return $ret;
                    break;  
         case 'searchprogramme':
                    $course=new class_programme();
                    $ret=$course->searchprogramme($CLGID,$data);
                    return $ret;
                    break;                         
        default :
            echo("invalid action");
            die();    
        } 
        //print_r($ret);die;
        //return true;          
?>