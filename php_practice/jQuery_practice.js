/**
 * Created by puppylpy on 17/05/2017.
 */
$(document).ready(function(){
    $('#ex0').fadeOut('slow');
});

$('#ex1').click(function(){
    $('#ex1').fadeOut();
});

$('#ex2').dblclick(function(){
    $('#ex2').fadeOut();
});

/* jQuery - 链(Chaining)
 * 通过 jQuery，可以把动作/方法链接在一起。
 * Chaining 允许我们在一条语句中运行多个 jQuery 方法（在相同的元素上）
 */

$('#ex3').dblclick(function(){
    $('#ex3').fadeOut("slow").fadeIn("slow").css("color","red").slideUp(2000).slideDown(2000);
    $("#ex0").toggle();
    $("#ex1").toggle();
    $("#ex2").toggle();
});