




<div id="content"></div>


<div id="info_place">
   
    <span>Авто: </span><span id="auto"></span><br /><br />
    <span>Имя: </span><span id="name"></span><br /><br />
    <span>Телефон: </span><span id="phone"></span><br /><br />
    <span>Хранение: </span><span id="storage"></span><br /><br />
    <span>Заметка: </span><span id="note"></span>
    
</div>
<div id="close"><p>X</p></div>





<div  id="form_place_new">                 <!-- Форма для новой записи -->
<p >Новая запись</p>
    
    <form action="add_edit.php" method="post">
        <input type="hidden" name="date"/>
        <input type="hidden" name="time"/>
        <input type="hidden" name="box"/>
        <label>Авто<input type="text" name="auto"/></label><br /><br />
        <label>Имя<input type="text" name="name" /></label><br /><br />
        <label>Телефон<input type="text" name="phone" /></label><br /><br />
        <label>Хранение<input type="text" name="storage" /></label><br /><br />
        <label>Заметка<input type="text" name="note" /></label><br /><br />
    <input type="submit" value="Записать"/>
    </form>
</div>

                                            
<div id="form_place_edit">                                  <!-- Форма для редактирования записи -->
<p>Редактирование</p>
    
    <form action="add_edit.php" method="post">
        <input type="hidden" name="id"/>
        <label>Дата<input type="date"  name="date"  /></label>
        <label>Время<input type="time" step="3600" min="09:00:00" max="18:00:00"  name="time"/></label><br /><br />
        <label>Пост<input type="text" size="1" name="box" /></label>
        
        <label>Авто<input type="text" name="auto"/></label><br /><br />
        
        <label>Имя<input type="text" name="name" /></label><br /><br />
        <label>Телефон<input type="text" name="phone" /></label><br /><br />
        <label>Хранение<input type="text" name="storage" /></label><br /><br />
        <label>Заметка<input type="text" name="note" /></label><br /><br />
        <input type="submit" value="Изменить"/>
    </form>
</div>
<div style="clear: both;"></div>
<br /><br />

<div  id="all_points_div">

<div  class="points_time points">
<table  class="all_table_point ">
    <th class="all_th_point all_th_point_time">Time</th>
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
</table>
</div>
<div id="point1" class="points"></div>
<div id="point3"  class="points"></div>
<div id="point4" class="points"></div>
<div id="point5" class="points"></div>
<div id="point6" class="points"></div>
<div id="point8" class="points"></div>
<div id="point9" class="points"></div>
<div id="point10" class="points"></div>
<div id="point11" class="points"></div>

</div>