$(document).ready(function(){
    $("#homeb").click(function(){
        $("#home").show(1000);
        $("#reg").hide(1000);
        $("#login").hide(1000);
    });
    $("#regb").click(function(){
        $("#home").hide(1000);
        $("#reg").show(1000);
        $("#login").hide(1000);
    });
    $("#loginb").click(function(){
        $("#home").hide(1000);
        $("#reg").hide(1000);
        $("#login").show(1000);
    });
   
});


