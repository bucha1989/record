<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */
require_once 'connect_db.php';
require_once 'functions.php';

if(isset($_POST['id'])) $id = check_string($_POST['id']);
if(isset($_POST['date'])) $date = check_string($_POST['date']);
if(isset($_POST['time'])) $time = check_string($_POST['time']);
if(isset($_POST['point'])) $point = check_string($_POST['point']);
if(isset($_POST['box'])) $box = check_string($_POST['box']);
if(isset($_POST['auto'])) $auto = check_string($_POST['auto']);
if(isset($_POST['name'])) $name = check_string($_POST['name']);
if(isset($_POST['phone'])) $phone = check_string($_POST['phone']);
if(isset($_POST['storage'])) $storage = check_string($_POST['storage']);
if(isset($_POST['note'])) $note = check_string($_POST['note']);



$auto =  mb_strtoupper(mb_substr($auto,0,1)).mb_strtolower(mb_substr($auto,1));
$name =  mb_strtoupper(mb_substr($name,0,1)).mb_strtolower(mb_substr($name,1));


function add_data($id,$date,$time,$point,$box,$auto,$name,$phone,$storage,$note){
        
        global $connection;
        if(isset($id)) $connection->query("DELETE FROM general WHERE id='$id'");
        $connection->query("INSERT INTO general VALUES (null,'$date','$time','$point','$box','$auto','$name','$phone','$storage','$note')");
        header ("Location: index.php?date=".$date); //redirect на индекс
}


add_data($id,$date,$time,$point,$box,$auto,$name,$phone,$storage,$note); //выполнение функции доб\ред
?>