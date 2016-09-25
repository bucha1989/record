$(document).ready(function() {
    
        function fade_hide() {
                $('#info_content').hide()
                $('#info_content').fadeIn(300)      //при переключении вкладок с сервисами
        }


        function choise(obj) {
                $('.serv').css({
                        backgroundColor: '#28A5A7',     //подсветка кнопки с выбранным сервисом
                        color: 'white',
                        outline: 'none'
                })
                $(obj).css({
                        backgroundColor: 'white',
                        color: '#28A5A7',
                        outline: '1px solid #28A5A7'
                })
        }
        
                                            //Вывод информации по каждому сервису
        
        $('#serv1').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_1.jpg'/><p>ул. Ленина, 2</p><p>(057) 750-87-87</p><p>(050) 300-94-64</p>");
                choise(this)
        }).trigger('click')
        $('#serv3').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_3.jpg'/><p>ул. Веринская 1</p><p>(057) 751-70-09</p><p>(050) 364-17-93</p>");
                choise(this)
        })
        $('#serv4').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_4.jpg'/><p>пр. Льва Ландау, 62В</p><p>(057) 736-82-46</p><p>(050) 301-03-31</p>");
                choise(this)
        })
        $('#serv5').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_5.jpg'/><p>ул. Шевченко, 216</p><p>(057) 773-76-07</p><p>(050) 327-07-03</p>");
                choise(this)
        })
        $('#serv6').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_6.jpg'/><p>ул. Клочковская, 44</p><p>(057) 759-69-66</p><p>(050) 364-79-09</p>");
                choise(this)
        })
        $('#serv8').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_8.jpg'/><p>ул. Сидора Ковпака, 24</p><p>(057) 750-72-88</p><p>(050) 343-07-44</p>");
                choise(this)
        })
        $('#serv9').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_9.jpg'/><p>ул. Хар. Дивизий, 29-А</p><p>(057) 757-23-38</p><p>(066) 055-13-59</p>");
                choise(this)
        })
        $('#serv10').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_10.jpg'/><p>пр-т. Московский, 142-А</p><p>(057) 758-92-02</p><p>(066) 055-10-75</p>");
                choise(this)
        })
        $('#serv11').click(function() {
                fade_hide()
                $('#info_content').html("<img src='images/ser_11.jpg'/><p>пр-т. Московский, 137-А</p><p>(057) 762-77-10</p><p>(066) 055-01-16</p>");
                choise(this)
        })
})