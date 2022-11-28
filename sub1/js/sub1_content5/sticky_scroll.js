$(document).ready(function () {
  $(".navTab li:eq(0)").find("a").addClass("current2");
  //첫번째 서브메뉴 활성화

  // $(".pageNav .contentBox:eq(0)").addClass("boxMove");
  //첫번째 내용글 애니메이션 처리
  var smh = $(".navTab").offset().top; //메인 비주얼의 높이
  var h0 = $(".pageNav > li:eq(0)").offset().top - 300;
  var h1 = $(".pageNav > li:eq(1)").offset().top - 300;
  var h2 = $(".pageNav > li:eq(2)").offset().top - 300;
  var h3 = $(".pageNav > li:eq(3)").offset().top - 300;
  var cnt = 0;

  //스크롤의 좌표가 변하면.. 스크롤 이벤트
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop() + 100;
    //스크롤top의 좌표를 담는다

    //sticky menu 처리
    if (scroll > smh) {
      $(".navTab").addClass("navOn");
      //스크롤의 거리가 350px 이상이면 서브메뉴 고정
      $("#headerArea").hide();
    } else {
      $(".navTab").removeClass("navOn");
      //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
      $("#headerArea").show();
    }

    $(".navTab li").find("a").removeClass("current2");
    //모든 서브메뉴 비활성화~ 불꺼!!!

    //스크롤의 거리의 범위를 처리

    //변수 사용해서 if문
    if (scroll >= 0 && scroll <= h1) {
      cnt = 0;
    } else if (scroll > h1 && scroll <= h2) {
      cnt = 1;
    } else if (scroll > h2 && scroll <= h3) {
      cnt = 2;
    } else if (scroll > h3) {
      cnt = 3;
    }

    $(".navTab li:eq(" + cnt + ")")
      .find("a")
      .addClass("current2");
  });

  // tab click, scroll move
  $(".navTab li a").click(function (e) {
    e.preventDefault();

    var ind = $(this).index(".navTab li a");
    var value = $(".pageNav > li:eq(" + ind + ")").offset().top - 180;

    // value의 위치로 움직여라
    $("html,body").stop().animate({ scrollTop: value }, 500);
    console.log(ind);
  });
});
