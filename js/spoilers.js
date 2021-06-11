$(".closed").toggleClass("show");

$(".title_spoiler").click(function(){
 $(this).parent().toggleClass("show").children("div.contents").slideToggle("medium");
 if ($(this).parent().hasClass("show"))
     $(this).children(".title_h3").css("background", "#095867");
 else $(this).children(".title_h3").css("background", "#095867");
});