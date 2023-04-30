// php-ajax livesearch using jquery dev by kyawzayya
//,.,.;;;    ///// 
$(document).ready(function(){
    $("#output").hide();
    $("#search").keypress(function(){
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data:{
                data:$("#search").val(),
            },
            success:function(data){
                $("#output").show().html(data);
                $("#close").click(function(){
                  $("#output").hide();
                });
            }
        });
    });
});