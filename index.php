<?php
    session_start();
    if(!$_SESSION['point']) header ("Location: authoriz.php"); //redirect на авторизацию
    else $point = $_SESSION['point'];
    if($point == '777') header ("Location: admin.php");
    
    if(isset($_POST['calendar_date'])) $date = $_POST['calendar_date']; //если дата передана календарем
    else $date = date('Y-m-d',time());                                  //если не передана назначается текущая 
    if(isset($_GET['date'])) $date = $_GET['date'];                     //дата возвращенная функцией удаления или доб-редакт
    
     //задается Сессией
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Сервис <?php echo $point;?></title>
  <link type="text/css" rel="stylesheet" href="css/reset.css"  />
  <link type="text/css" rel="stylesheet" href="css/style.css"  />
  <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
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
  
  <script src="js/phone_form.js"></script>
     <script>
        jQuery(function($){
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
        $("#phone").mask("(999) 999-9999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        });
     </script>
  
 </head>
 
<body onload="startTime()">
<div id="left"></div>
<div id="today" >
<?php if($date == date('Y-m-d',time())) echo 'Сегодня';?></div>
<header>
    <div id="header" onmousedown="return false">
    
        <span id="point_top"><a href="index.php?date=<?php echo date('Y-m-d',time());?>">Сервис <?php echo $point;?></a></span>   
        <span id="date_top"><?php echo $date;?></span>
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

    <form action="index.php" method="post">
        <input style="color:<?php if($date == date('Y-m-d',time())) echo '#00CA87';?>;"  id="calendar" onchange="submit()" required="" type="date" name="calendar_date" value="<?php echo $date;?>"
       />  <!-- Календарь -->
    </form>
    <div id="txt" onmousedown="return false"></div>             <!-- Часы -->
    <div class="circle"  onmousedown="return false"></div>      <!-- Статистика -->
    <div class="text_circle" onmousedown="return false"></div> <!-- Статистика -->

<div class="clear"></div> <!-- Отмена обтекания -->
    <div class="text_circle_bottom" onmousedown="return false">Общая<br />заполненность<br />сервисов</div> <!-- Статистика -->
         
</div>

<div id="point_block">                  

    <?php
        require_once 'each_point.php';          //подключение файла по текущему сервису          
    ?>
</div>


<div id="content">


</div> <!-- Выдвигающаяся часть -->



<div id="info_place">   <!-- Информация о записанном автомобиле -->
<p class="cont_name">Информация</p>
    <p>Авто: <span class="auto"></span></p><p class="br"></p>
    <p>Имя: <span class="name"></span></p><p class="br"></p>
    <p>Телефон: <span class="phone"></span></p><p class="br"></p>
    <p>Хранение: <span class="storage"></span></p><p class="br"></p>
    <p>Заметка: <span class="note"></span></p>
</div>

<div id="close"><p>x</p></div>  <!-- Кнопка закрыть контент -->





<div  id="form_place_new">                 <!-- Форма для новой записи -->
<p class="cont_name">Новая запись</p>
    <form action="add_edit.php" method="post">
        <input type="hidden" name="date"/>
        <input type="hidden" name="time"/>
        <input type="hidden" name="box"/>
        <input type="hidden" name="point" value="<?php echo $point;?>"/>
        <label>Авто<input type="text" required="" placeholder="макс. 15 симв" maxlength="15" name="auto"/></label><br />
        <label>Имя<input type="text"  placeholder="макс. 15 симв" maxlength="15"  name="name" /></label><br />
        <label>Телефон<input class="mask" placeholder="(xxx)-xxx-xx-xx" type="text"  name="phone" /></label><br />
        <label>Хранение<input type="text" placeholder="макс. 10 симв" maxlength="10"  name="storage" /></label><br />
        <label><span class="note2">Заметка</span><textarea maxlength="100" placeholder="макс. 100 симв" name="note"></textarea></label><br />
        <input type="submit" value="Записать"/>
    </form>
</div>

                                            
<div id="form_place_edit">                                  <!-- Форма для редактирования записи -->
<p class="cont_name">Редактирование</p>
    <form action="add_edit.php" method="post">
        <input type="hidden" name="id" />
        <input type="hidden" name="point" value="<?php echo $point;?>"/>
        <label>Дата<input min="<?php echo date('Y-m-d',time());?>" type="date" required="" name="date"  /></label><br />
        <label>Время<input type="time" required="" placeholder="time" step="3600" min="09:00:00" max="18:00:00"  name="time" /></label><br />
        


       
        <label>Пост<select name="box" >
        
           <option value="1">1</option>
		<?php if($box_two == 'yes') echo '<option value="2">2</option>';?>
		<?php if($box_three == 'yes') echo '<option value="3">3</option>';?>
      
            
        </select></label><br />
        
        <label>Авто <input type="text" required="" placeholder="макс. 15 симв" maxlength="15" name="auto" /></label><br />
        <label>Имя<input type="text"  placeholder="макс. 15 симв" maxlength="15"  name="name" /></label><br />
        <label>Телефон<input class="mask" placeholder="(xxx)-xxx-xx-xx"  type="text" name="phone" /></label><br />
        <label>Хранение<input type="text" placeholder="макс. 10 симв" maxlength="10" name="storage" /></label><br />
        <label><span class="note2">Заметка</span><textarea maxlength="100" placeholder="макс. 100 симв"  name="note"></textarea></label><br />
        <input type="submit" value="Изменить"/>
    </form>
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

<div id="point_info_tag" onmousedown="return false"><p>Информация</p></div> <!-- Ярлык ИНФОРМАЦИЯ -->


<div id="point_info" onmousedown="return false">
            <div  class="serv" id="serv1">1</div>  <!-- Ярлыки по сервисам -->
            <div class="serv" id="serv3">3</div>
            <div class="serv" id="serv4">4</div>
            <div class="serv" id="serv5">5</div>
            <div class="serv" id="serv6">6</div>
            <div class="serv" id="serv8">8</div>
            <div class="serv" id="serv9">9</div>
            <div class="serv" id="serv10">10</div>
            <div class="serv" id="serv11">11</div>
            
            <div id="info_content"></div> <!-- Содержание -->
</div>
<footer>
<div id="footer"><div id="author">&#169; Buchastiy Sergey 2016</div></div> <!-- Футер -->
</footer>




</body>
</html>