$(document).ready(function () {
  var on_off = false; //false(안오버)  true(오버)

  $("#headerArea").mouseenter(function () {
    // var scroll = $(window).scrollTop();
    $(this).css("background", "rgba(0, 0, 0, 0.8)");

    on_off = true;
  });

  $("#headerArea").mouseleave(function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리

    // 메인 위에 있을 때만 배경 오프, 밑에 있을 때는 배경 온
    if (scroll < 300) {
      $(this).css("background", "none");
    } else {
      $(this).css("background", "rgba(0, 0, 0, 0.8)");
    }
    on_off = false;
  });

  // $(window).on('scroll',function(){}); : 스크롤의 거리가 발생하면
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수 // scrollTop : 내려온 거리

    if (scroll > 300) {
      //스크롤 700까지 내리면
      $("#headerArea")
        .css("background", "rgba(0, 0, 0, 0.8)")
    } else {
      //스크롤 내리기 전 디폴트(마우스올리지않음)
      if (on_off == false) {
        //마우스가 헤더에 안오버 했을 때 투명
        $("#headerArea").css("background", "none");
      }
    }
  });



  // nav========================================
  $(".menu-trigger").toggle(function(e) {
    e.preventDefault();

    $(".mainMenu").css("right", "0").css("opacity", "1");
    $(".menu-trigger").addClass("on");
    $("#headerArea").css("box-shadow", "none");
    $("#headerArea").css("background", "rgba(0, 0, 0, 0.8)")
  }, function() {
      $(".mainMenu").css("right", "-100%").css("opacity", "0");
      $(".menu-trigger").removeClass("on");
    });
    
    
     var current=0; // 640이상 == 1 / 640이하 == 0
    $(window).resize(function(){ 
       var screenSize = $(window).width(); 
       if( screenSize > 1024){
        $(".mainMenu").css("right", "0").css("opacity", "1");
        $(".menu-trigger").addClass("on");
         current=1;
       }
       if(current==1 && screenSize <= 1024){
        $(".mainMenu").css("right", "-100%").css("opacity", "0");
        $(".menu-trigger").removeClass("on");
         current=0;
       }
     }); 

     var $this = $(".menu-trigger");

     $this.on("click", function (e) {
       e.preventDefault();
       $(this).toggleClass("active");
     });




  // top move========================================
  $(".topMove").click(function (e) {
    e.preventDefault();
    //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({ scrollTop: 0 }, 1000); //선택자 주의(스크롤 이벤트)//스크롤을 부드럽게 움직이는 코드
  });

});
