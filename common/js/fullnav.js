$(document).ready(function () {
  var smh = $(".main").height(); //비주얼 이미지의 높이를 리턴한다 //반응형 대비 변수로 처리
  var on_off = false; //false(안오버)  true(오버)

  $("#headerArea").mouseenter(function () {
    // var scroll = $(window).scrollTop();
    $(this).css("background", "#fff");
    $(this).addClass("on");
    $(".dropdownmenu .menu a").css("color", "#333");
    $("#headerArea .headerInner .headerRight a").css("color", "#333");

    on_off = true;
  });

  $("#headerArea").mouseleave(function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리

    // 메인 위에 있을 때만 배경 오프, 밑에 있을 때는 배경 온
    if (scroll < smh - 250) {
      $(this).css("background", "none").css("border-bottom", "none");
      $(".dropdownmenu .menu a").css("color", "#fff");
      $(this).removeClass("on");
      $("#headerArea .headerInner .headerRight a").css("color", "#fff");
    } else {
      $(this).css("background", "#fff");
      $(".dropdownmenu .menu > a").css("color", "#333");
    }
    on_off = false;
  });

  // $(window).on('scroll',function(){}); : 스크롤의 거리가 발생하면
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수 // scrollTop : 내려온 거리
    // console.log(scroll);
    var imageUrl = "../images/footer_logo1.png";

    if (scroll > smh - 250) {
      //스크롤300까지 내리면
      $("#headerArea")
        .css("background", "#fff")
        .css("border-bottom", "1px solid #ccc")
        .addClass("on");
      $(".dropdownmenu .menu a").css("color", "#333");
      $("#headerArea .headerInner .headerRight a").css("color", "#333");
    } else {
      //스크롤 내리기 전 디폴트(마우스올리지않음)
      if (on_off == false) {
        //마우스가 헤더에 안오버 했을 때 투명
        $("#headerArea").css("background", "none").css("border-bottom", "none");
        $(".dropdownmenu .menu a").css("color", "#fff");
        $("#headerArea").removeClass("on");
        $("#headerArea .headerInner .headerRight a").css("color", "#fff");
      }
    }
  });

  //2depth 열기/닫기
  $("ul.dropdownmenu").hover(
    function () {
      $("ul.dropdownmenu li.menu ul").fadeIn("normal", function () {
        $(this).stop();
      }); //모든 서브를 다 열어라
      $("#headerArea").animate({ height: 320 }, "fast").clearQueue();
    },
    function () {
      $("ul.dropdownmenu li.menu ul").hide(); //모든 서브를 다 닫아라
      $("#headerArea").animate({ height: 100 }, "fast").clearQueue();
    }
  );

  //1depth 효과
  $("ul.dropdownmenu li.menu").hover(
    function () {
      $(".depth1", this).css("color", "rgba(47, 71, 152, 1");
    },
    function () {
      $(".depth1", this).css("color", "#333");
    }
  );

  //1depth 효과
  $(".headerRight li").hover(
    function () {
      $(".bntColor", this).css("color", "rgba(47, 71, 152, 1");
    },
    function () {
      $(".bntColor", this).css("color", "#333");
    }
  );

  //tab 처리
  $("ul.dropdownmenu li.menu .depth1").on("focus", function () {
    $("ul.dropdownmenu li.menu ul").slideDown("normal");
    $("#headerArea").animate({ height: 320 }, "fast").clearQueue();
  });

  $("ul.dropdownmenu li.m6 li:last")
    .find("a")
    .on("blur", function () {
      $("ul.dropdownmenu li.menu ul").slideUp("fast");
      $("#headerArea").animate({ height: 100 }, "normal").clearQueue();
    });

  // top move========================================
  $(".topMove").hide();

  $(window).on("scroll", function () {
    //스크롤 값의 변화가 생기면
    var scroll2 = $(window).scrollTop(); //스크롤의 거리
    var footerHeight = $("#footerArea").offset().top - $(window).height();

    //  $(".text").text(scroll); // 소수점까지 찍힘
    // $(".text").text(Math.floor(scroll));

    if (scroll2 > 300) {
      //500이상의 거리가 발생되면
      $(".topMove").fadeIn("slow"); //top보여라~~~~

      if (scroll2 > footerHeight) {
        //500이상의 거리가 발생되면
        $(".topMove").addClass("stick"); //top보여라~~~~
      } else {
        $(".topMove").removeClass("stick"); //top보여라~~~~
      }
    } else {
      $(".topMove").fadeOut("fast"); //top안보여라~~~~
    }
  });

  $(".topMove").click(function (e) {
    e.preventDefault();
    //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({ scrollTop: 0 }, 1000); //선택자 주의(스크롤 이벤트)//스크롤을 부드럽게 움직이는 코드
  });

  //family site========================================
  $(".family .familyMore").toggle(
    function () {
      $(".family .familyList").fadeIn("slow");
      $(this).find("span").html('<i class="fa-solid fa-angle-down"></i>');
      // $(".modal_box").fadeIn("fast");
    },
    function () {
      $(".family .familyList").fadeOut("fast");
      $(this).find("span").html('<i class="fa-solid fa-angle-up"></i>');
    }
  );

  // $(".modal_box, .familyList").click(function (e) {
  //   e.preventDefault();
  //   $(".modal_box, .family .familyList").fadeOut("fast");
  // });

  //enter안해도 저절로 열림
  //tab키 처리
  $(".family .familyMore").on("focus", function () {
    $(".family .familyList").fadeIn("slow");
    $(this).find("span").html('<i class="fa-solid fa-angle-down"></i>');
  });
  $(".family .familyList li:last a").on("blur", function () {
    $(".family .familyList").fadeOut("fast");
    $(".family .familyMore")
      .find("span")
      .html('<i class="fa-solid fa-angle-up"></i>');
  });
});
