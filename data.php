<!DOCTYPE html> 
<html>
<body>
<head>
<meta charset="windows-1251" />
</head>
<style>
td{
text-align: center;
}
</style>
<table border="1">
    <tr>
    	<th>�</th>
		<th>������</th>
        <th>����</th>
        <th>�����</th>
        <th>����������</th>
        <th>��� �������</th>
        <th>�������</th>
        <th>��������</th>
        <th>�������</th>
        <th>����</th>
		
	</tr>
	<?php
    $sort = 'point';
    
    if(isset($_GET['sort'])) $sort = $_GET['sort'];
    
    
 	//connection to mysqli
	require_once 'connect_db.php';
    
	$connection->set_charset('cp1251'); //��������� ����������� � �� ����������� �� cp1251 ��� �������� ������
    
	//query get data
	$result = $connection->query("SELECT * FROM general ORDER BY $sort ASC");
    
    $num = $result->num_rows;
    $number = 1;
    
    for($i=0;$i<$num;++$i){
        
    $row = $result->fetch_array(MYSQLI_ASSOC);
        
echo  <<<_END
        <tr>
            <td>$number</td>
            <td>$row[point]</td>
            <td>$row[date]</td>
            <td>$row[time]</td>
            <td>$row[auto]</td>
            <td>$row[name]</td>
            <td>$row[phone]</td>
            <td>$row[storage]</td>
            <td>$row[note]</td>
            <td>$row[box]</td>
        </tr>
_END;

    ++$number;
    
    }
   
	?>
    
    </tr>
</table>
</body>
</html>