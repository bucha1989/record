<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */

require_once 'connect_db.php';

if(isset($_POST['id'])) $id = $_POST['id'];
if(isset($_POST['date'])) $date = $_POST['date'];



function delete_data($id,$date){
    
    global $connection;
    $connection->query("DELETE FROM general WHERE id='$id'");
    //header ("Location: get_data.php?date=".$date); //   
}


delete_data($id,$date);


echo $id.$date;
?>