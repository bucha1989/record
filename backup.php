<?php

    session_start();
    if(!$_SESSION['point']) {
        header ("Location: authoriz.php");
        die();
    } //redirect на авторизацию
    else $point = $_SESSION['point'];
    
$db_username = 'record'; //данные для подключения к БД
$db_password = '128821';
$db_database = 'record';
$db_host = '';    
    
 if($point == 777)  backup_database_tables($db_host,$db_username,$db_password,$db_database, '*');
    else header ("Location: authoriz.php");





// backup the db function
function backup_database_tables($host,$user,$pass,$name,$tables)
{

$link = mysql_connect($host,$user,$pass);

mysql_set_charset('utf8'); //кодировка подключения к БД

mysql_select_db($name,$link);

//get all of the tables
if($tables == '*')
{
$tables = array();
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}

//cycle through each table and format the data
foreach($tables as $table)
{
$result = mysql_query('SELECT * FROM '.$table);
$num_fields = mysql_num_fields($result);

$return = 'DROP TABLE '.$table.';';
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = preg_replace("/n/","\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}

//save the file
$handle = fopen('backup/db-backup-'.date('Y-m-d',time()).'.sql','w+');
fwrite($handle,$return);
fclose($handle);


$file = 'backup/db-backup-'.date('Y-m-d',time()).'.sql';
 header ("Content-Type: application/octet-stream");
 header ("Accept-Ranges: bytes");
 header ("Content-Length: ".filesize($file));  
 header ("Content-Disposition: attachment; filename=".$file);  
 readfile($file);

}

?>