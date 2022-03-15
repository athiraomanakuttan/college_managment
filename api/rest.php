<?php
require_once( "model/models.php");
require_once( "db/connection.php");
$UID=1;
$CLGID=1;
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
        default :
            echo("invalid action");
            die();    
        }            
?>