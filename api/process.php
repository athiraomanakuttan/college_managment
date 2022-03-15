<?php
require_once( "model/models.php");
require_once( "db/connection.php");
$UID=1;
$CLGID=1;
$data = $_REQUEST['datas'];
var_dump($data);
// $data = json_decode($data);
// $data = objectToArray($data);

var_dump($_REQUEST['datas']);
if(!$_POST['action'])
{echo("no action"); die();}
else{ $action=$_POST['action']; }
switch ($action) {
        case 'addCollege':

            $college = new class_college();
            $ret = $college->addNewCollege($data);
            return $ret;
            break;
        default :
            echo("invalid action");
            die();    
        }            
?>