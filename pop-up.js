$(".pop-up-activate").click(function(){
    $("body").css("pointer-events", "none");
    $(".pop-up").css("display", "flex")
    console.log("Esto si funciona")
    console.log($('.pop-up')[0]);
    $(".pop-up").slideDown(500);
});
$(".pop-up-del").click(function(){
    $("body").css("pointer-events", "none");
    $(".pop-up-borrar").css("display", "flex")
    console.log("Esto si funciona")
    console.log($('.pop-up-borrar')[0]);
    $(".pop-up-borrar").slideDown(500);
});
$(".pop-up-cancel").click(function(){
    $("body").css("pointer-events", "all");
    $(".pop-up").css("display", "none")
    $(".pop-up-borrar").css("display", "none")
    console.log("Esto si funciona")
    console.log($('.pop-up')[0]);
    $(".pop-up").slideDown(500);
    $(".pop-up-borrar").slideDown(500);
});
