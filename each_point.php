<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */
    //point и user заданы в индексе
    require_once 'connect_db.php';
    require_once 'functions.php';
    $box_two = '';              //явное объявление
    $box_three = '';            //явное объявление
    if($point == 1 || $point == 3 || $point == 4 || $point == 5 || $point == 8 || $point == 6){$box_two = 'yes';} //переменная для дальнейшего вкл. бокса 2
    if($point == 1 || $point == 4){ $box_three = 'yes';} //переменная для дальнейшего вкл. бокса 3
    
   
?>
    
 
    
<?php    
 

//выборка для бокса 1
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='$point' AND box = '1' ORDER BY time");
//выборка для бокса 2
if($box_two == 'yes'){
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='$point' AND box = '2' ORDER BY time");}
//выборка для бокса 3
if($box_two == 'yes'){
$result3 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='$point' AND box = '3' ORDER BY time");}

if(!$result1 && !$result2 && !!$result3) die($connection->error);//В случае ошибки окончание и вывод

$array_basis = array_basis();//Присваивание базового массива переменной

$num1 = $result1->num_rows;                     //количество полученных строк бокс 1
if(isset($result2))$num2 = $result2->num_rows;  //количество полученных строк бокс 2
if(isset($result3))$num3 = $result3->num_rows;  //количество полученных строк бокс 3




if(isset($num1) && $num1>0){    
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
}    
 
if(isset($num2) &&$num2>0){    
    for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
}      
   
if(isset($num3) &&$num3>0){    
    for ($i = 0; $i < $num3; ++$i)//создание массива с данными
    {     
        $row3 = $result3->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box3[$row3['time']] = $row3;    //массив с данными Бокс 3
    }
}      
   
   
  
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 elseif($box_two == 'yes') $box2 = $array_basis;            //если массив пуст при 2-х боксах
 
 if(isset($box3))$box3 = array_merge($array_basis,$box3);
 elseif($box_three == 'yes') $box3 = $array_basis;          //если массив пуст при 3-х боксах
    

?>



<table class="table_point_time">                                <!-- Таблица время -->
    <th>Время</th>
<?php foreach($array_basis as $time=>$value):?>
    <tr>
        <td><?php echo substr($time,0,5);?></td>
    </tr>
<?php endforeach;?>
</table>



<table class="table_point_box">                                 <!-- Таблица Бокс 1 -->
    <th>Пост 1</th>
    <?php foreach($box1 as $time =>$data):?>
    <tr>
        <td         data-id='<?php echo $data['id'];?>'
                data-date='<?php echo $date;?>'
                data-time='<?php echo $time;?>'
                data-point='<?php echo $point;?>'
                data-box='1'
                data-auto='<?php echo $data['auto'];?>'
                data-name='<?php echo $data['name'];?>'
                data-phone='<?php echo $data['phone'];?>'
                data-storage='<?php echo $data['storage'];?>'
                data-note='<?php echo $data['note'];?>' >
                <?php if($data['auto']!=''){
                
                echo $data['auto'];
                
                echo "<span data-id='$data[id]' data-date='$date' class='delete'>x</span>" ;}?>
        </td>
    </tr>
    <?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table class="table_point_box">                                 <!-- Таблица Бокс 2 -->
    <th>Пост 2</th>
    <?php foreach($box2 as $time =>$data):?>
    <tr>
        <td     data-id='<?php echo $data['id'];?>'
                data-date='<?php echo $date;?>'
                data-time='<?php echo $time;?>'
                data-point='<?php echo $point;?>'
                data-box='2'
                data-auto='<?php echo $data['auto'];?>'
                data-name='<?php echo $data['name'];?>'
                data-phone='<?php echo $data['phone'];?>'
                data-storage='<?php echo $data['storage'];?>'
                data-note='<?php echo $data['note'];?>' >
                <?php if($data['auto']!=''){
                
                echo $data['auto'];
                
                echo "<span data-id='$data[id]' data-date='$date' class='delete'>x</span>" ;}?>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif?>


<?php if(isset($box3)):?>
<table class="table_point_box">                                 <!-- Таблица Бокс 3 -->
    <th>Пост 3</th>
    <?php foreach($box3 as $time =>$data):?>
    <tr>
        <td     data-id='<?php echo $data['id'];?>'                 
                data-date='<?php echo $date;?>'
                data-time='<?php echo $time;?>'
                data-point='<?php echo $point;?>'
                data-box='3'
                data-auto='<?php echo $data['auto'];?>'
                data-name='<?php echo $data['name'];?>'
                data-phone='<?php echo $data['phone'];?>'
                data-storage='<?php echo $data['storage'];?>'
                data-note='<?php echo $data['note'];?>' >
                <?php if($data['auto']!=''){
                
                echo $data['auto'];
                
                echo "<span data-id='$data[id]' data-date='$date' class='delete'>x</span>" ;}?>
        </td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif?>


