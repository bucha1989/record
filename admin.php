<?php

    session_start();
    if(!$_SESSION['point']) header ("Location: authoriz.php"); //redirect на авторизацию
    else $point = $_SESSION['point'];
    if($point != '777') header ("Location: authoriz.php");//проверяет зашел ли Админа
    
    if(isset($_POST['calendar_date'])) $date = $_POST['calendar_date']; //если дата передана календарем
    else $date = date('Y-m-d',time());                                  //если не передана назначается текущая 
    if(isset($_GET['date'])) $date = $_GET['date'];
                       //дата возвращенная функцией удаления или доб-редакт
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Admin</title>
  <link type="text/css" rel="stylesheet" href="css/reset.css"  />
  <link type="text/css" rel="stylesheet" href="css/style.css"  />
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 
  <script src="js/myscripts.js"></script> 
  <script src="js/all_point.js"></script>
  <script src="js/clock.js"></script>
  <script src="js/diagram.js"></script>
  <script src="js/serv_info.js"></script>
    <!-- Подключение шрифтов -->
  <link href='https://fonts.googleapis.com/css?family=Russo+One&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Ubuntu&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Exo+2:600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  
  <!-- Стили для админа -->
<style>     
.all_points {
position:relative;
margin:5px;
}

.all_points td {
font-size:11px;
width:78px;
max-width:90px;
white-space:nowrap;
color:#FFF;
overflow:hidden;
margin:auto;
padding:0;
}

#all_points_div {
margin-left:264px;
margin-top:-311px;
width:850px;
}

#save_all {
position:fixed;
right:11px;
top:91px;
background:#FFF;
width:130px;
text-align:center;
font-size:20px;
border-radius:5px;
border:2px solid #00CA87;
padding:5px 20px 20px;
}

#save_all a {
color:#00CA87;
text-decoration:none;
}

.save {
margin-top:15px;
}

#save_all a:hover {
color:#FF2F2F;
}

#save_all a:active {
font-size:18px;
}

#save_all span {
font-size:10px;
}

#point1 {
margin-left:15px;
}

#point5 {
margin-left:15px;
}

</style>

 </head>
<body onload="startTime()">

<div id="save_all"> <!-- Блок для скачивания -->

        <div class="save">
        <a href="backup.php">Backup</a></div>
        
        <div class="save">
        <p><a href="export.php?sort=date">Скачать БД<br /><span>(сортировка по дате)</span></a></p></div>
        
        <div class="save">
        <p><a href="export.php?sort=point">Скачать БД<br /><span>(сортировка по сервису)</span></a></p></div>

</div>

<div id="today" >
<?php if($date ==date('Y-m-d',time())) echo 'Сегодня';?></div>
<header>
    <div id="header" onmousedown="return false">   <!-- Шапка сайта -->
        <span id="point_top">
        <a href="admin.php?date=<?php echo date('Y-m-d',time());?>">АДМИН</a>
        </span><span id="date_top">
        <?php echo $date;?></span>
        <span id="exit_top"><a href="logout.php">Выход</a></span>
    </div>
</header>


<div class="meteo" id="cont_140955ed96f025f3687e10896cc25c5a">   <!-- Погода -->
    <span id="h_140955ed96f025f3687e10896cc25c5a">
        <a id="a_140955ed96f025f3687e10896cc25c5a" href="http://www.pogoda.com/" target="_blank" rel="nofollow" style="color:#7EC9CA;font-family:Roboto;font-size:14px;"></a>
    </span><script type="text/javascript" async src="http://www.pogoda.com/wid_loader/140955ed96f025f3687e10896cc25c5a"></script>
</div>


<div class="clear"></div> <!-- Отмена обтекания -->


<div  id="left_col" >

    <form action="admin.php" method="post">
        <input  style="color:<?php if($date == date('Y-m-d',time())) echo '#00CA87';?>;"   id="calendar" onchange="submit()" required="" type="date" name="calendar_date" value="<?php echo $date;?>"/>  <!-- Календарь -->
    </form>
    <div id="txt" onmousedown="return false"></div>         <!-- Часы -->
    <div class="circle"  onmousedown="return false"></div>  <!-- Статистика -->
    <div class="text_circle" onmousedown="return false"></div> <!-- Статистика -->
<div class="clear"></div> <!-- Отмена обтекания -->
    <div class="text_circle_bottom" onmousedown="return false">Общая<br />заполненность<br />сервисов</div> <!-- Статистика -->
         
</div>


<div class="clear"></div> <!-- Отмена обтекания -->


<div id="all_points_div"  onmousedown="return false">   <!-- Блоки с таблицами по всем сервисам -->

<div  id="all_points_time">  <!-- Таблица со временем -->
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

    <div id="all_div_point"></div><!-- Все в файле php (all_servises) --> 
    
</div>


<footer>
<div id="footer"><div id="author">&#169; Buchastiy Sergey 2016</div></div> <!-- Футер -->
</footer>


</body>
</html>