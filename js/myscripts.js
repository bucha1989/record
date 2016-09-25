$(document).ready(function() { //документ загружен

          


        current_date = new Date();
        year = current_date.getFullYear();
        month = current_date.getMonth();
        day = current_date.getDate();
        month = ++month;
        if (current_date.getMonth() < 10) {
                month = '0' + month;
        }
        if (current_date.getDate() < 10) {
                day = '0' + day;
        }
        current_date = year + '-' + month + '-' + day;
        if ($("#calendar").val() < current_date) {              //проверка актуальности даты
                $('.delete').remove();
        }

        function margin_back() { //возврат отступов для общего блока
                $('#content').animate({
                        marginBottom: '0'
                }, 300);
                $('#all_points_div').animate({
                        marginTop: '-52px'
                }, 300);
        }

        function td_color() { // задает цвета свободно\занято
                $('.table_point_box td[data-auto!=""]').css({
                        backgroundColor: '#FF2F2F',
                        color: 'white'
                }) //красный
                $('.table_point_box td[data-auto=""]').css({
                        backgroundColor: '#00CA87',
                        color: 'white'
                }) //зеленый
        }

        function content_SH() { //при переключении вкладок
                $('#content').hide();
                $('#content').show(300);
        }
        td_color();
        if ($("#calendar").val() >= current_date) {
                $('td[data-auto=""]').click(function() { //клик по пустой ячейке вызов формы
                
                        $('#point_info').hide(300);
                        $('.table_point_box td .delete').show()
                        $('#close').hide();
                        $('#close').fadeIn(450);
                        td_color();
                        $(this).css({
                                backgroundColor: '#FFFB38'
                        }) //желтый
                        $('#form_place_new input[name=time]').val($(this).attr('data-time'))
                        $('#form_place_new input[name=date]').val($(this).attr('data-date'))
                        $('#form_place_new input[name=box]').val($(this).attr('data-box'))
                        content_SH();
                        $('#content').html($('#form_place_new').html());
                        margin_back()
                        $(".mask").mask("999-999-99-99");
                })
        }
        $('.table_point_box td[data-auto!=""]').click(function() { //клик по заполненной ячейке и вызов описания
                $('#point_info').hide(300);
                $('.table_point_box td .delete').show()
                //$(this).children('.delete').hide();
                $('#close').hide();
                $('#close').fadeIn(450);
                td_color();
                $(this).css({
                        backgroundColor: '#FFFB38',
                        color: '#000'
                }) //желтый
                content_SH();
                $('#content').html($('#info_place').html())
                $('.date').html($(this).attr('data-date'))
                $('.time').html($(this).attr('data-time'))
                $('.box').html($(this).attr('data-box'))
                $('.auto').html($(this).attr('data-auto'))
                $('.name').html($(this).attr('data-name'))
                $('.phone').html($(this).attr('data-phone'))
                $('.storage').html($(this).attr('data-storage'))
                $('.note').html($(this).attr('data-note'))
                margin_back()
        })
        if ($("#calendar").val() >= current_date) {
                $('.table_point_box td[data-auto!=""]').dblclick(function() { //клик по эдиту для редактирования заполненного
                        $('#close').hide();
                        $('#close').fadeIn(450);
                        $('#content').animate({
                                marginBottom: '-18px'
                        }, 300);
                       
                       
                       
                       if($('#point_top a').html()!='Сервис 4' && $('#point_top a').html()!='Сервис 1'){   //если поста 3
                       
                       
                        $('#all_points_div').animate({
                                marginTop: '0px'
                        }, 300);
                        }
                        
                        content_SH();
                        $(this).css({
                                backgroundColor: '#FF982A',
                                color: 'white'
                        }); //orange
                        $('#content').html($('#form_place_edit').html());
                        $('input[name=id]').val($(this).attr('data-id'))
                        $('input[name=date]').val($(this).attr('data-date'))
                        $('input[name=time]').val($(this).attr('data-time'))
                        $('select[name=box]').val($(this).attr('data-box'))
                        $('input[name=auto]').val($(this).attr('data-auto'))
                        $('input[name=name]').val($(this).attr('data-name'))
                        $('input[name=phone]').val($(this).attr('data-phone'))
                        $('input[name=storage]').val($(this).attr('data-storage'))
                        $('textarea[name=note]').html($(this).attr('data-note'))
                       $(".mask").mask("999-999-99-99");
                })
        }
        $('#close').click(function() { //клик по крестику
                $('.table_point_box td .delete').show()
                $('#content').hide(300)
                $(this).hide(300)
                td_color()
                margin_back()
        })
        $('.delete').click(function(event) { //клик по удалению
                if (confirm('Удалить?')) {
                        $.ajax({
                                type: "POST",
                                url: "delete.php",
                                data: "id=" + $(this).attr('data-id') + "&date=" + $(this).attr('data-date'),
                                success: function(msg) {
                                        location.reload(true);
                                }
                        });
                }
                event.stopPropagation();
        })
        $('#point_info_tag').click(function() { //ярлык ИНФОРМАЦИЯ
                $('#point_info').show(300);
                $('#content').hide(300)
                margin_back()
                td_color()
                $('#close').hide();
        })
        $('#point_info').dblclick(function() { //двойной клик для скрытия блока Информации
                $('#point_info').hide(300);
                margin_back()
                td_color()
                $('#close').hide();
        })
        
                
}) //документ загружен