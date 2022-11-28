//gallery====================================
var youPosition = 0; //최초위치
var movesize = 240; //마진값까지 리턴
var youtubeCnt = 0; // 2 3 4 5 6 0 1

//슬라이드
$(".youtube ul").after($(".youtube ul").clone());
//슬라이드 겔러리를 한번 복제
$(".page span:eq(0)").addClass("now"); // pagenation 처음 시작

$(".leftRight").click(function (e) {
  e.preventDefault();

  if ($(this).is(".youtubeLeft")) {
    //이전버튼 클릭

    youtubeCnt--;
    $(".page span").removeClass("now");
    $(".page span:eq(" + youtubeCnt + ")").addClass("now");
    if (youtubeCnt == -1) youtubeCnt = 6;

    if (youPosition == 0) {
      $(".youtubeGallery").css("left", -1680);
      youPosition = -1680;
    } //첫화면에서 좌측 오류 방지

    youPosition += movesize; // 550씩 증가
    $(".youtubeGallery")
      .animate({ left: youPosition }, "fast", function () {
        if (youPosition >= 0) {
          $(".youtubeGallery").css("left", -1680);
          youPosition = -1680;
        }
      })
      .clearQueue();
  } else if ($(this).is(".youtubeRight")) {
    //다음버튼 클릭

    youtubeCnt++;
    if (youtubeCnt == 7) youtubeCnt = 0;
    $(".page span").removeClass("now");
    $(".page span:eq(" + youtubeCnt + ")").addClass("now");

    youPosition -= movesize; // 550씩 감소
    $(".youtubeGallery")
      .animate({ left: youPosition }, "fast", function () {
        if (youPosition <= -2160) {
          youPosition = -480;
          $(".youtubeGallery").css("left", -480);
        }
      })
      .clearQueue(); //animate안에 콜백함수 사용(애니매이션 끝난 후 계산)
  }
  // console.log(youtubeCnt);
});

//modal====================================
var popup = [
  {
    title: "동반성장플러스 넷스파편 l 효성협력업체 l HBS",
    subtitle:
      "효성인들이 환경을 위해 일상속에서 어떠한 일들을 하고 있는지 함께 만나 보실까요?",
    url: "C_pSS9kCv5M",
  },
  {
    title: "보여주세요 지구를 지켜라 l VLOG l HBS",
    subtitle:
      "효성인들이 환경을 위해 일상속에서 어떠한 일들을 하고 있는지 함께 만나 보실까요?",
    url: "ijINDvQNTLA",
  },
  {
    title: "효성첨단소재 반려해변 정화활동 l 용유해변 l ESG활동 l HBS",
    subtitle:
      "효성첨단소재의 새로운 가족이 생겼어요!? 다소 생소한 반려해변 제도를 직접 체험하고 실천하는 시간을 가졌는데요. 효성인들의 ESG 활동의 현장으로 다함께 가 보실까요? ",
    url: "81fA1QZN1_s",
  },
  {
    title: "효성티앤씨, 세계 최초 바이오 스판덱스 상용화 l HBS",
    subtitle:
      "효성티앤씨가 세계에서 처음으로 옥수수를 활용한 친환경 스판덱스를 생산하는데 성공했습니다.",
    url: "KH6VB8bycks",
  },
  {
    title: "효성그룹 하반기 56기 신입사원 브이로그 l HBS",
    subtitle:
      "효성인으로 새로운 출발을 시작하는 56기 하반기 신입사원들의 브이로그! 자세한 내용, 영상으로 확인해보세요.",
    url: "lO5OzwvJJhc",
  },
  {
    title: "동반성장플러스 리슬편 l 친환경 한복 l HBS",
    subtitle:
      "[리슬] 이란 브랜드를 알고 있나요? 전세계의 슈퍼스타 BTS 뿐만아니라, 유재석, 송가인 등 대한민국의 스타들이 즐겨 입는 퓨전한복의 대표 주자 입니다. ",
    url: "tBjJCQd_cgo",
  },
  {
    title: "칭찬해요 효성히어로 l 칭찬합시다 l HBS",
    subtitle:
      "바쁜 회사 생활속에서 나에게 힘이 되어 주며, 항상 고마운 마음을 간직하고 있는 동료가 있으신가요? 평소에 표현하지는 못했지만 칭찬을 아끼고 싶지 않은 당신 히어로는 누구인가요?",
    url: "FMBLqJbvzJM",
  },
];

var popInd = 0;
var txt = "";

function popchange() {
  $(".popup iframe").attr(
    "src",
    "https://www.youtube.com/embed/" + popup[popInd].url
  );
  txt = "";
  txt += "<dl>";
  txt += "<dt>" + popup[popInd].title + "</dt>";
  txt += "<dd>" + popup[popInd].subtitle + "</dd>";
  txt += "</dl>";
  $(".popup .txt").html(txt);
}

$(".youtubeGallery a").click(function (e) {
  e.preventDefault();

  popInd = $(this).index(".youtubeGallery a"); // 0 1 2 3 4 5 6
  if (popInd == 7) {
    popInd = 0;
  } else if (popInd == 8) {
    popInd = 1;
  } else if (popInd == 9) {
    popInd = 2;
  } else if (popInd == 10) {
    popInd = 3;
  } else if (popInd == 11) {
    popInd = 4;
  } else if (popInd == 12) {
    popInd = 5;
  } else if (popInd == 13) {
    popInd = 6;
  }

  $(".popup").fadeIn("fst");
  $(".modalBox").fadeIn("slow");
  $(".modalBtn").fadeIn("slow");
  console.log(popInd);
  popchange();
});

$(".closeBtn, .modalBox").click(function (e) {
  e.preventDefault();
  $(".modalBox").fadeOut("fast");
  $(".popup").fadeOut("fast");
  $(".modalBtn").fadeOut("fast");
});

$(".modalBtn a").click(function (e) {
  e.preventDefault();

  $(".popup").hide().fadeIn("slow");

  if ($(this).hasClass("modalLeft")) {
    // 3 2 1 0 3 2 1 1
    if (popInd == 0) popInd = popup.length; // 순서중요 : ind--보다 위에 있어야함
    popInd--;
    popchange();
  } else if ($(this).hasClass("modalRight")) {
    // 0 1 2 3 0 1 2 3
    if (popInd == popup.length - 1) popInd = -1;
    popInd++;
    popchange();
  }
  console.log(popInd);
});
