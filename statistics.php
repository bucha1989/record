<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */

require_once 'connect_db.php';


$date = $_POST['date'];


$result = $connection->query("SELECT auto FROM general WHERE date='$date'");

$num = $result->num_rows;

$all = 160;

$percent = ($num/160)*100;
$percent = round($percent,0,PHP_ROUND_HALF_UP);

echo $percent;

?>