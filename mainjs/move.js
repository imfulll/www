// JavaScript Document

$(document).ready(function () {
  //main visual==============================================
  var timeonoff; //자동기능 구현
  var imageCount = $(".gallery ul li").size();
  var cnt = 1; //이미지 순서 1 2 3 4 5 4 3 2 1 2 3 4 5 ...

  var direct = 1; //1씩 증가(+1)/감소(-1)
  var position = 0; //겔러리 무비의 left값 0 -1000 -2000 -3000 -4000
  var onoff = true; // true=>타이머 동작중 , false=>동작하지 않을때

  $(".btn1").css("background", "#aaa"); //첫번째 불켜
  $(".btn1").css("width", "100");
  $(".btn1").addClass("btnOn");

  $(".gallery_text li:eq(0)").fadeIn("slow"); //첫번째 텍스트만 보여라~~~

  function moveg() {
    cnt += direct; //카운트가 1 2 3 4 5 4 3 2 1 2 3 4 5 ......
    //각각의 카운트에 대한 left 좌표값을 처리

    position = -(cnt - 1) * 2000;
    //  if (cnt == 1) {
    //    position = 0;
    //  } else if (cnt == 2) {
    //    position = -1000;
    //  } else if (cnt == 3) {
    //    position = -2000;
    //  } else if (cnt == 4) {
    //    position = -3000;
    //  } else if (cnt == 5) {
    //    position = -4000;
    //  }
    $(".gallery").animate({ left: position }, "slow"); //겔러리 무비의 left값을 움직여라~

    $(".mbutton").removeClass("btnOn");
    $(".gallery_text li").hide(); //모든 텍스트를 안보이게...
    $(".gallery_text li:eq(" + (cnt - 1) + ")").fadeIn("slow"); //해당 텍스트만 보여라

    for (var i = 1; i <= imageCount; i++) {
      $(".btn" + i).css("background", "#aaa"); //버튼불다꺼!!
      $(".btn" + i).css("width", "10");
    }
    $(".btn" + cnt).css("width", "100"); //자신만 불켜
    $(".btn" + cnt).addClass("btnOn");

    if (cnt == imageCount) direct = -1;
    if (cnt == 1) direct = 1;
  }

  timeonoff = setInterval(moveg, 5000); //4초마다 자동기능

  $(".mbutton").click(function (event) {
    //각각의 버튼을 클릭한다면...

    var $target = $(event.target); //$target == this =>실제 클릭한 버튼
    clearInterval(timeonoff); //타이머를 중지!!

    for (var i = 1; i <= imageCount; i++) {
      $(".mbutton").removeClass("btnOn");
      $(".btn" + i).css("background", "#aaa"); //버튼 모두불꺼
      $(".btn" + i).css("width", "10");
    }

    if ($target.is(".btn1")) {
      //첫번째 버튼을 클릭했다면...
      $(".gallery").animate({ left: 0 }, "slow");
      cnt = 1;
      direct = 1;
    } else if ($target.is(".btn2")) {
      //두번째 버튼을 클릭했다면...
      $(".gallery").animate({ left: -2000 }, "slow");
      cnt = 2;
    } else if ($target.is(".btn3")) {
      //세번째 버튼을 클릭했다면...
      $(".gallery").animate({ left: -4000 }, "slow");
      cnt = 3;
      direct = -1;
    }

    $(".gallery_text li").hide();
    $(".gallery_text li:eq(" + (cnt - 1) + ")").fadeIn("slow");

    $(".btn" + cnt).css("width", "100"); //자신 버튼만 불켜
    $(".btn" + cnt).addClass("btnOn");

    timeonoff = setInterval(moveg, 5000); //타이머의 재 동작

    if (onoff == false) {
      onoff = true;
      $(".ps").html(
        '<span class="hidden">stop</span><i class="fa-regular fa-circle-stop"></i>'
      );
    }
  });

  //stop/play 버튼 클릭시 타이머 동작/중지
  $(".ps").click(function () {
    if (onoff == true) {
      clearInterval(timeonoff); // stop버튼 클릭시
      $(this).html(
        '<span class="hidden">play</span><i class="fa-regular fa-circle-play"></i>'
      );
      onoff = false;
    } else {
      timeonoff = setInterval(moveg, 5000); //play버튼 클릭시
      $(this).html(
        '<span class="hidden">stop</span><i class="fa-regular fa-circle-stop"></i>'
      );
      onoff = true;
    }
  });

  $(".main .btn").click(function () {
    clearInterval(timeonoff);

    if ($(this).is(".btnRight")) {
      if (cnt == imageCount) cnt = 0;
      //카운트가 마지막 번호(5)라면 초기화 0
      if (cnt == imageCount + 1) cnt = 1;
      cnt++; //카운트 1씩증가
    } else if ($(this).is(".btnLeft")) {
      if (cnt == 1) cnt = imageCount + 1;
      if (cnt == 0) cnt = imageCount;
      cnt--; //카운트 감소
    }
    //console.log(cnt);
    $(".gallery")
      .animate({ left: (cnt - 1) * -2000 }, "slow")
      .clearQueue(); // 1->0 2->-1000 3->-2000 4->-3000 5->-4000

    $(".mbutton").removeClass("btnOn");
    $(".gallery_text li").hide(); //모든 텍스트를 안보이게...
    $(".gallery_text li:eq(" + (cnt - 1) + ")").fadeIn("slow"); //해당 텍스트만 보여라

    for (var i = 1; i <= imageCount; i++) {
      $(".btn" + i).css("background", "#aaa"); //버튼 모두불꺼
      $(".btn" + i).css("width", "10");
    }
    $(".btn" + cnt).css("width", "100"); //자신 버튼만 불켜
    $(".btn" + cnt).addClass("btnOn");

    if ($(this).is(".btnRight")) {
      if (cnt == imageCount) {
        cnt = 0;
        direct = 1;
      }
    } else if ($(this).is(".btnLeft")) {
      if (cnt == 1) {
        cnt = imageCount + 1;
        direct = -1;
      }
    }

    timeonoff = setInterval(moveg, 5000);

    if (onoff == false) {
      onoff = true;
      $(".ps").html(
        '<span class="hidden">stop</span><i class="fa-regular fa-circle-stop"></i>'
      );
    }
  });

  //business==========================================
  //business area btn
  var cnt2 = 0; // 0 1 2 3 4
  var imageCount2 = $(".businessCon li").size();
  var areaKind = [
    "섬유 <br> & 무역",
    "중공업<br> & 건설",
    "산업<br>자재",
    "화학",
    "정보<br>통신",
  ];

  // var conText = [
  //   {
  //     title: "섬유 & 무역",
  //     explain:
  //       "혁신적인 섬유기술과 글로벌 무역네트워크로<br /> 고객가치를 극대화 합니다.",
  //   },
  //   {
  //     title: "중공업 & 건설",
  //     explain:
  //       "미래 전력망 시스템과 친환경 건설이<br /> 녹색성장을 이끌어 갑니다.",
  //   },
  //   {
  //     title: "산업자재",
  //     explain: "최적의 첨단소재로 고객의<br /> 안전과 행복을 최우선 합니다.",
  //   },
  //   {
  //     title: "화학",
  //     explain:
  //       "편리한 일상생활에는 언제나<br /> 효성의 화학소재기술이 함께 합니다.",
  //   },
  //   {
  //     title: "정보통신",
  //     explain:
  //       "가정에서 산업과 금융까지 스마트하게 연결된<br /> 첨단 네트워크를 구축합니다.",
  //   },
  // ];

  var txt = "";

  function change() {
    $("businessCon li img").attr(
      "src",
      "./images/business0" + (cnt2 + 1) + ".jpg"
    );
    txt = "";
    txt += '<div class="businessText">';
    txt += "<p><span>0" + (cnt2 + 1) + "</span> / 0" + conText.length + "</p>";
    txt += "<dl>";
    txt += "<dt>" + conText[cnt2].title + "</dt>";
    txt += "<dd>" + conText[cnt2].explain + "</dd>";
    txt += "</dl>";
    txt +=
      '<a href="./sub2/sub2_' +
      (cnt2 + 1) +
      '.html" class="more"> view more </a>';
    txt += "</div>";
    $(".businessCon li").html(txt);
  }

  $(".businessCon li").hide(); //모든 텍스트를 안보이게...
  $(".businessCon li:eq(0)").fadeIn();

  $(".business .businessBtn a").click(function (e) {
    e.preventDefault();

    if ($(this).is(".businessRight")) {
      if (cnt2 == imageCount2 - 1) cnt2 = -1;
      cnt2++; //카운트 1씩증가
    } else if ($(this).is(".businessLeft")) {
      if (cnt2 <= 0) cnt2 = imageCount2;
      cnt2--; //카운트 감소
    }

    $(".businessCon li").hide(); //모든 텍스트를 안보이게...
    $(".business li:eq(" + cnt2 + ")").fadeIn("slow"); //해당 텍스트만 보여라

    // change();
    if (cnt2 == 4) {
      $(".businessRight span:nth-of-type(2)").text("01");
      $(".businessRight span:nth-of-type(3)").html(areaKind[0]);
    } else if (cnt2 >= 0 || cnt2 < 4) {
      $(".businessRight span:nth-of-type(2)").text("0" + (cnt2 + 2));
      $(".businessRight span:nth-of-type(3)").html(areaKind[cnt2 + 1]);
    }
  });

  //global network============================================
  var table = [
    {
      title: "USA",
      location: "North Carolina(Hyosung Holdings U.S.A., Inc.)",
      address:
        "15801 Brixham Hill Avenue, Suite 575 Charlotte, NC 28277, U.S.A.",
      tel: "1-704-790-6110",
      fax: "1-704-790-6109",
    },
    {
      title: "BRAZIL",
      location: "SANPAULO(Hyosung Do Brasil Importadora E Exportadora Ltda.)",
      address:
        "Av. Eng. Luis Carlos Berrini, 1297 Conj 142, Brooklin, Edificio Sudameris,<br> Sao Paulo, Brasil",
      tel: "55-11-5185-4200",
      fax: "55-704-790-6109",
    },
    {
      title: "CHINA",
      location: "JIAXING(Hyosung Chemical Fiber (Jiaxing) Co., Ltd.)",
      address:
        "No.1888, Dongfanglu, Jiaxing Economic Development Zone,<br> Jiaxing, Zhejiang, China",
      tel: "86-573-8222-8307",
      fax: "86-573-8222-8305",
    },
    {
      title: "GERMAN",
      location: "FRANKFURT(Hyosung TNC Corporation Frankfurt Office)",
      address: "Merganthalerallee 15-21, 65760 Eschborn, Germany",
      tel: "49-(0)6196-64024-10",
      fax: "49-573-8222-8305",
    },
    {
      title: "INDIA",
      location: "PUNE(Hyosung T&D India Pvt. Ltd.)",
      address:
        "PLOT NO. IP-11, KHED CITY, VILLAGE NIMGAON, KHED TALUKA,<br> PUNE - 410505, MAHARASHTRA, INDIA",
      tel: "91-21-3563-1700",
      fax: "91-21-4014-7889",
    },
    {
      title: "RUSSIA",
      location: "MOSCOW(Hyosung Russia LLC.)",
      address:
        "Prospect Vernadskogo 6, Business Center 5th Floor, Moscow, 119311",
      tel: "7-495-510-6131",
      fax: "7-495-510-0402",
    },
    {
      title: "SAUDI ARABIA",
      location: "RIYADH(Hyosung Industries Corporation Saudi Arabia Office)",
      address:
        "P.O BOX 2807 Jareer Street, Malaz, Riyadh, Kingdom of Saudi Arabia",
      tel: "966-11-473-5480",
      fax: "966-11-292-1178",
    },
    {
      title: "UK",
      location: "MANCHESTER(Hyosung Heavy Industries UK Branch)",
      address:
        "Suite 1, Parkway 5, Parkway Business Centre, Princess Rd, <br> Manchester M14 7HR, UK",
      tel: "44-161-226-9559",
      fax: "44-161-226-1115",
    },
  ];

  var ind = 0;
  var txt2 = "";

  function popchange() {
    txt2 = "";
    txt2 += "<thead>";
    txt2 += "<tr>";
    txt2 += '<th colspan="2" scope="col">' + table[ind].title + "</th>";
    txt2 += "</tr>";
    txt2 += "</thead>";
    txt2 += "<tbody>";
    txt2 += "<tr>";
    txt2 += '<th scope="row">Location<br />(Office Name)</th>';
    txt2 += "<td>";
    txt2 += table[ind].location;
    txt2 += "</td>";
    txt2 += "</tr>";
    txt2 += "<tr>";
    txt2 += '<th scope="row">Address</th>';
    txt2 += "<td>";
    txt2 += table[ind].address;
    txt2 += "</td>";
    txt2 += "</tr>";
    txt2 += "<tr>";
    txt2 += '<th scope="row">Tel</th>';
    txt2 += "<td>" + table[ind].tel + "</td>";
    txt2 += "</tr>";
    txt2 += "<tr>";
    txt2 += '<th scope="row">Fax</th>';
    txt2 += "<td>" + table[ind].fax + "</td>";
    txt2 += "</tr>";
    txt2 += "</tbody>";

    $(".businessTable table").html(txt2);
  }

  $(".networkCont ul li a").click(function (e) {
    e.preventDefault();

    ind = $(this).index(".networkCont ul li a"); // 0 1 2 3

    $(".businessTable").fadeIn("slow");

    popchange();
    console.log(ind);
  });

  $(".close_btn").click(function (e) {
    e.preventDefault();
    $(".businessTable").fadeOut("fast");
  });

  //new center==================================================
  var position2 = -300; //최초위치
  var movesize = 550; //마진값까지 리턴
  var newsCnt = 2; // 2 3 4 0 1 / 2 3 4 0 1

  //슬라이드
  $(".newsGallery ul").after($(".newsGallery ul").clone());
  //슬라이드 겔러리를 한번 복제

  $(".bnt").click(function (e) {
    e.preventDefault();

    if ($(this).is(".bntLeft")) {
      //이전버튼 클릭

      if (position2 == -300) {
        $(".newsGallery").css("left", -3050);
        position2 = -3050;
      } //첫화면에서 좌측 오류 방지

      position2 += movesize; // 550씩 증가
      $(".newsGallery")
        .animate({ left: position2 }, "fast", function () {
          if (position2 >= -300) {
            $(".newsGallery").css("left", -3050);
            position2 = -3050;
          }
        })
        .clearQueue();
    } else if ($(this).is(".bntRight")) {
      //다음버튼 클릭

      position2 -= movesize; // 550씩 감소
      $(".newsGallery")
        .animate({ left: position2 }, "fast", function () {
          if (position2 <= -3050) {
            position2 = -300;
            $(".newsGallery").css("left", -300);
          }
        })
        .clearQueue(); //animate안에 콜백함수 사용(애니매이션 끝난 후 계산)
    }
    console.log(newsCnt);
  });

  //scroll============================================
  $(window).on("scroll", function () {
    //스크롤 값의 변화가 생기면
    var mainScroll = $(window).scrollTop(); //스크롤의 거리
    // var mainScrollGap = $(window).height() / 2;
    var mainScrollGap = $(window).height() - 500;

    // BUSINESS
    var mainBusiness = $(".business").offset().top - mainScrollGap;
    if (mainScroll > mainBusiness) {
      $(".business").addClass("active");
    } else if (mainScroll < mainBusiness - 500) {
      $(".business").removeClass("active");
    }

    // 지속가능경영
    var mainEsg = $(".esg").offset().top - mainScrollGap;
    if (mainScroll > mainEsg) {
      $(".esg").addClass("active");
    } else if (mainScroll < mainEsg - 500) {
      $(".esg").removeClass("active");
    }

    // 네트워크
    var mainNetwork = $(".network").offset().top - mainScrollGap;
    if (mainScroll > mainNetwork) {
      $(".network").addClass("active");
    } else if (mainScroll < mainNetwork - 500) {
      $(".network").removeClass("active");
    }

    // 뉴스룸
    var mainNotice = $(".news").offset().top - mainScrollGap;
    if (mainScroll > mainNotice) {
      $(".news").addClass("active");
    } else if (mainScroll < mainNotice - 500) {
      $(".news").removeClass("active");
    }

    // 투자정보
    var mainInvest = $(".invest").offset().top - mainScrollGap - 200;
    if (mainScroll > mainInvest) {
      $(".invest").addClass("active");
    } else if (mainScroll < mainInvest - 500) {
      $(".invest").removeClass("active");
    }
  });
});
