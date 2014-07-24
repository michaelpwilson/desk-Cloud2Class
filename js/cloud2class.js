$(document).ready(function (){

$( ".navbar-fixed-bottom .nav-tabs li a" ).on('click', function (){
$( ".col-xs-12" ).css( "min-height", "62%" );
$( ".navbar-fixed-bottom" ).css( "height", "200px" );
});

$(".open-nav").click(function (){
$(this).class("active");
$("#nav-text").css("display", "flex").fadeIn();
});
$(".close-nav").click(function (){
$(this).fadeOut();
$(".open-nav").fadeIn();
$("#nav-text").fadeOut();
});

$(".open-files").click(function (){
$(this).attr("class", "tab close-files").addClass("active");
$.post( "includes/files.php", { assoc: "xdxmp" }, function(data) {
  $("#files-text").html(data).addClass("files").css("display", "flex").fadeIn();
  $("iframe").css("min-height", "65%");
  $(".file-option").on("click", function(e) {
  option = $(this).attr('id');
  filename = $(this).parent().find('#name').text();
  if(option == "download") {
  $.fileDownload(filename);
   return false;
  } else {
  alert(option + filename);
  }
  });
});
});

$(".tab .close-files").click(function (){
$(this).attr("class", "tab open-files").removeClass("active");
$("#files-text").removeClass("files").fadeOut(100);
$("iframe").css("min-height", "85%");
});

$(".open-worksheets").click(function (){
$(this).addClass("active");
$.post( "includes/worksheets.php", { assoc: "xdxmp" }, function(data) {
  $("#files-text").addClass("worksheets").html(data).css("display", "flex").fadeIn();
  $("iframe").css("min-height", "70%");
});

});
$(".close-worksheets").click(function (){
$(this).fadeOut(100);
$(".open-worksheets").fadeIn(100);
$("#files-text").removeClass("worksheets").fadeOut(100);
$("iframe").css("min-height", "85%");
});


});
