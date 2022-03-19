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
        default :
            echo("invalid action");
            die();    
        }            
?>