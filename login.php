<?php

require_once 'connect_db.php';
require_once 'functions.php';

$user = check_string($_POST['user']);
$pass = check_string($_POST['pass']);

$result =$connection->query("SELECT point FROM auth WHERE user='$user' AND pass='$pass'");

$num = $result->num_rows;

if($num>0){
    
    $row = mysqli_fetch_array($result,MYSQL_ASSOC);
    session_start();
    $_SESSION['point'] = $row['point'];
    if($_SESSION['point']=='777') header ("Location: admin.php");
    else header ("Location: index.php");
}else{
    
    header ("Location: authoriz.php");
}
?>