<?php

session_start();
    if(!$_SESSION['point']) header ("Location: authoriz.php"); //redirect на авторизацию
    else $point = $_SESSION['point'];
    if($point != '777') header ("Location: authoriz.php");

// The function header by sending raw excel
header("Content-type: application/vnd-ms-excel");

// Defines the name of the export file "codelution-export.xls"
header("Content-Disposition: attachment; filename=client_base_".date('Y-m-d',time()).".xls");
 
// Add data table
require_once 'data.php';


?>

