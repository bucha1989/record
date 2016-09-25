$(document).ready(function() { //Ajax для общей таблицы сервисов
        ajax_require(); //первый запуск 
        setInterval(ajax_require,300000); //обновление каждые 5 минут

        function ajax_require() {
                $.ajax({
                        type: "POST",
                        url: "each_point_all.php",
                        data: "date=" + $("#calendar").val(),
                        //сервис 1
                        success: function(msg) {
                                $('#all_div_point').html(msg);
                        }
                });
               
        }
})
