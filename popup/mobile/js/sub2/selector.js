// JavaScript Document

//selectyear toggle=======================
$(document).ready(function () {
  
  $(".contentText > li:eq(0)").fadeIn();
  
  $(".selector > a").click(
    function(e){
      e.preventDefault()

      var selector = $(this)

    if(selector.hasClass("hide")){
      $(this).removeClass("hide")
      $(this).addClass("show")
      $(".selector ul").stop().slideDown("slow")
      $(".selector > a i").attr("class","fa-solid fa-chevron-up")
    } else{
      $(this).removeClass("show")
      $(this).addClass("hide")
      $(".selector ul").stop().slideUp("fast")
      $(".selector > a i").attr("class","fa-solid fa-chevron-down")
      }
    });

  $(".selector ul li a").click(
    function(e){
      e.preventDefault()

    var ind = $(this).index(".selector ul li a");
    var text = $(this).html();

    
    $(".contentText > li").hide()
    $(".contentText > li:eq(" + ind + ")").fadeIn()
    
    $(".selector ul").hide("fast")
    $(".selector > a").removeClass("show")
    $(".selector > a").addClass("hide")
    $(".selector > a").html(text + ' <i class="fa-solid fa-chevron-down"></i>')

    });
    
});