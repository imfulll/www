// JavaScript Document

//selectyear toggle=======================
$(document).ready(function () {
  
  $("#content table:eq(0)").fadeIn();
  $("#content .barChart canvas:eq(0)").fadeIn();
  
  $(".selectBox div > a").click(
    function(e){
      e.preventDefault()

      var selector = $(this)

    if(selector.hasClass("hide")){
      $(this).removeClass("hide")
      $(this).addClass("show")
      $(".selectBox div ul").stop().slideDown("slow")
      $(".selectBox div > a i").attr("class","fa-solid fa-chevron-up")
    } else{
      $(this).removeClass("show")
      $(this).addClass("hide")
      $(".selectBox div ul").stop().slideUp("fast")
      $(".selectBox div > a i").attr("class","fa-solid fa-chevron-down")
      }
    });

  $(".selectBox div ul li a").click(
    function(e){
      e.preventDefault()

    var ind = $(this).index(".selectBox div ul li a");
    var text = $(this).html();

    $("#content table").hide();
    $("#content table:eq(" + ind + ")").fadeIn();
    $("#content .barChart canvas").hide();
    $("#content .barChart canvas:eq(" + ind + ")").fadeIn();
    
    $(".selectBox div ul").hide("fast")
    $(".selectBox div > a").removeClass("show")
    $(".selectBox div > a").addClass("hide")
    $(".selectBox div > a").html(text + ' <i class="fa-solid fa-chevron-down"></i>')

    });
    
});