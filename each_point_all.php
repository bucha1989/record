<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */


require_once 'connect_db.php';
require_once 'functions.php';
//задаеться сессией


session_start();

$user = $_SESSION['point'];

$date = $_POST['date']; //задается Аякс
$array_basis = array_basis();//Присваивание базового массива переменной
?>

<!-- Сервис 1 -->
<div id="point1" class="all_points">
<?php
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='1' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='1' AND box = '2' ORDER BY time");
$result3 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='1' AND box = '3' ORDER BY time");

if(!$result1 && !$result2 && !!$result3) die($connection->error);//В случае ошибки окончание и вывод



$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2
$num3 = $result3->num_rows;  //количество полученных строк бокс 3


   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

    for ($i = 0; $i < $num3; ++$i)//создание массива с данными
    {     
        $row3 = $result3->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box3[$row3['time']] = $row3;    //массив с данными Бокс 3
    }
      
   
   

    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 
 if(isset($box3))$box3 = array_merge($array_basis,$box3);
 else $box3 = $array_basis;          //если массив пуст при 3-х боксах
    
    
 ?>

<div id="all_point_num">1</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>


<?php if(isset($box3)):?>
<table  class="all_table_point">                            <!-- Таблица Бокс 3 -->
    <th>III</th>
<?php foreach($box3 as $time =>$data):?>
<tr>
    <td            
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"><?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>

</div>
<?php
unset($box1,$box2,$box3);
?>


<!-- Сервис 3 -->
    <div id="point3" class="all_points">
<?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='3' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='3' AND box = '2' ORDER BY time");

if(!$result1 && !$result2) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2



   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

   
    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 

 ?>

<div id="all_point_num">3</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>

    
    </div>
    <?php
unset($box1,$box2,$box3);
?>
    
    
    <!-- Сервис 4 -->
    <div id="point4" class="all_points">
    
    <?php
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='4' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='4' AND box = '2' ORDER BY time");
$result3 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='4' AND box = '3' ORDER BY time");

if(!$result1 && !$result2 && !!$result3) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2
$num3 = $result3->num_rows;  //количество полученных строк бокс 3


   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

    for ($i = 0; $i < $num3; ++$i)//создание массива с данными
    {     
        $row3 = $result3->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box3[$row3['time']] = $row3;    //массив с данными Бокс 3
    }
      
   
   
   
   
   
      
   
   
    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 
 if(isset($box3))$box3 = array_merge($array_basis,$box3);
 else $box3 = $array_basis;          //если массив пуст при 3-х боксах
    
    
 ?>

<div id="all_point_num">4</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>


<?php if(isset($box3)):?>
<table  class="all_table_point">                            <!-- Таблица Бокс 3 -->
    <th>III</th>
<?php foreach($box3 as $time =>$data):?>
<tr>
    <td            
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"><?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>

    </div>
    
<?php if($user == 777):?>
<div class="clear"></div> <!-- Отмена обтекания -->
<div  id="all_points_time">                              <!-- Таблица со временем (для админа) -->
    <table>
        <thead>
            <tr><th></th><tr>
            <tr><th>Время</th><tr>
        </thead>
        <tbody>
            <tr><td>09:00</td></tr>
            <tr><td>10:00</td></tr>
            <tr><td>11:00</td></tr>
            <tr><td>12:00</td></tr>
            <tr><td>13:00</td></tr>
            <tr><td>14:00</td></tr>
            <tr><td>15:00</td></tr>
            <tr><td>16:00</td></tr>
            <tr><td>17:00</td></tr>
            <tr><td>18:00</td></tr>
        </tbody>
    </table>
</div>    

<?php endif; ?>
    <?php
unset($box1,$box2,$box3);
?>
    <!-- Сервис 5 -->
    <div id="point5" class="all_points">
    
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='5' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='5' AND box = '2' ORDER BY time");

if(!$result1 && !$result2) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2



   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

   
    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 

 ?>

<div id="all_point_num">5</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>
    </div>
    
    <?php
unset($box1,$box2,$box3);
?>
    
    <!-- Servis 6 -->
<div id="point6" class="all_points">
    
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='6' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='6' AND box = '2' ORDER BY time");

if(!$result1 && !$result2) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2



   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

   
    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 

 ?>

<div id="all_point_num">6</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>
    </div>
    <?php
unset($box1,$box2,$box3);
?>

    <!-- Сервис 8 -->
    <div id="point8" class="all_points">
    
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='8' AND box = '1' ORDER BY time");
$result2 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='8' AND box = '2' ORDER BY time");

if(!$result1 && !$result2) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1
$num2 = $result2->num_rows;  //количество полученных строк бокс 2



   
    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   
     for ($i = 0; $i < $num2; ++$i)//создание массива с данными
    {     
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box2[$row2['time']] = $row2;    //массив с данными Бокс 1
    }
     
   

   
    
 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 if(isset($box2)) $box2 = array_merge($array_basis,$box2);
 else $box2 = $array_basis;            //если массив пуст при 2-х боксах
 

 ?>

<div id="all_point_num">8</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>



<?php if(isset($box2)):?>                                       
<table  class="all_table_point">                            <!-- Таблица Бокс 2 -->
    <th>II</th>
<?php foreach($box2 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
             title="<?php echo $data['auto'];?>"> <?php if($user==777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
<?php endif?>
    </div>
    <?php
unset($box1,$box2,$box3);
?>
    <!-- Сервис 9 -->
    <div id="point9" class="all_points">
    
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='9' AND box = '1' ORDER BY time");


if(!$result1) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1


    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   

 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 

 ?>

<div id="all_point_num">9</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
    </div>
    <?php
unset($box1,$box2,$box3);
?>
    <!-- Сервис 10 -->
    <div id="point10" class="all_points">
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='10' AND box = '1' ORDER BY time");


if(!$result1) die($connection->error);//В случае ошибки окончание и вывод


$num1 = $result1->num_rows;  //количество полученных строк бокс 1


    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   

 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 

 ?>

<div id="all_point_num">10</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
    
    </div>
    <?php
unset($box1,$box2,$box3);
?>
    <!-- Сервис 11 -->
    
    <div id="point11" class="all_points">
    <?php    
$result1 = $connection->query("SELECT * FROM general WHERE date='$date' AND point='11' AND box = '1' ORDER BY time");


if(!$result1) die($connection->error);//В случае ошибки окончание и вывод

$num1 = $result1->num_rows;  //количество полученных строк бокс 1


    for ($i = 0; $i < $num1; ++$i)//создание массива с данными
    {     
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);//строка с данными
        $box1[$row1['time']] = $row1;    //массив с данными Бокс 1
    }
   

 if(isset($box1)) $box1 = array_merge($array_basis,$box1);  
 else $box1 = $array_basis;                                 //если массив пуст
 
 

 ?>

<div id="all_point_num">11</div>

<table  class="all_table_point">                            <!-- Таблица Бокс 1 -->
    <th>I</th>
<?php foreach($box1 as $time =>$data):?>
<tr>
    <td     
            style="background-color:<?php if($data['auto']!='') {echo '#FF2F2F';}else{echo '#00CA87';}?>;"
            title="<?php echo $data['auto'];?>"> <?php if($user == 777) echo $data['auto'];?>
    </td>
               <!-- Цвет задается в зависимости от наличия непустого дата-авто-->
</tr>
<?php endforeach;?>
</table>
    </div>
