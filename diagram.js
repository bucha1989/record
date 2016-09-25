$(document).ready(function(){

percent();

setInterval(percent,300000)
        
        
     function percent(){  
        
        $.ajax({
         type: "POST",
        url: "statistics.php",
        data: "date="+$('#calendar').val(),
  
        success: function(msg){
            
            $('.text_circle').html(msg+'%')
            percent = msg
       
  
  
  
  
  var Circle = function(sel){
    var circles = document.querySelectorAll(sel);
    [].forEach.call(circles,function(el){
  
        valEl = msg;
        valEl = valEl*408/100;
        
        
        el.innerHTML = '<svg width="160" height="160"><circle transform="rotate(-90)" r="65" cx="-80" cy="80" /><circle transform="rotate(-90)" style="stroke-dasharray:'+valEl+'px 408px;" r="65" cx="-80" cy="80" /></svg>';
        
    });
};
Circle('.circle');
 }
  
        });
        
        

} 


})