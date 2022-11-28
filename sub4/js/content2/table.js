// JavaScript Document

//selectyear toggle=======================
$(document).ready(function () {
  $(".select").hover(
    function () {
      $(".selectBox .selectBtn").fadeIn("fast").clearQueue();
      $(".selectBox .selectYear").addClass("clicked");
    },
    function () {
      $(".selectBox .selectBtn").fadeOut("fast");
      $(".selectBox .selectYear").removeClass("clicked");
    }
  );

  $(".selectYear").click(
    function(e){
      e.preventDefault()
    }
  )

  //tab키 처리 : enter안해도 저절로 열림==============================
  $(".selectYear").on("focus", function () {
    $(".selectBox .selectBtn").fadeIn("slow");
    $(".selectYear").addClass("clicked");
  });
  $(".selectBtn li:last a").on("blur", function () {
    $(".selectBtn").fadeOut("fast");
    $(".selectYear").removeClass("clicked");
  });

  //table json 적용=======================================
  var xhr = new XMLHttpRequest(); // XMLHttpRequest 객체를 생성한다.
  var count = 0; // 0 1 2 3 4

  function ok(i) {
    var newContent = "";

    var short = responseObject.tableNum[i];

    function comma(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    } //천단위 , 처리

    newContent += '<table class="table2">';
    newContent += "<thead>";
    newContent += "<tr>";
    newContent += '<th scope="col" rowspan="2">계정과목</th>';
    newContent += '<th scope="col" colspan="4">' + short.year + "</th>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="col">1Q</th>';
    newContent += '<th scope="col">2Q</th>';
    newContent += '<th scope="col">3Q</th>';
    newContent += '<th scope="col">4Q</th>';
    newContent += "</tr>";
    newContent += "</thead>";
    newContent += "<tbody>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅰ. 유동자산</th>';
    newContent += "<td>" + comma(short.q1_1_1) + "</td>";
    newContent += "<td>" + comma(short.q2_1_1) + "</td>";
    newContent += "<td>" + comma(short.q3_1_1) + "</td>";
    newContent += "<td>" + comma(short.q4_1_1) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅱ. 비유동자산</th>';
    newContent += "<td>" + comma(short.q1_1_2) + "</td>";
    newContent += "<td>" + comma(short.q2_1_2) + "</td>";
    newContent += "<td>" + comma(short.q3_1_2) + "</td>";
    newContent += "<td>" + comma(short.q4_1_2) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">자산총계</th>';
    newContent += "<td>" + comma(short.q1_1_1 + short.q1_1_2) + "</td>";
    newContent += "<td>" + comma(short.q2_1_1 + short.q2_1_2) + "</td>";
    newContent += "<td>" + comma(short.q3_1_1 + short.q3_1_2) + "</td>";
    newContent += "<td>" + comma(short.q4_1_1 + short.q4_1_2) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅰ. 유동부채</th>';
    newContent += "<td>" + comma(short.q1_2_1) + "</td>";
    newContent += "<td>" + comma(short.q2_2_1) + "</td>";
    newContent += "<td>" + comma(short.q3_2_1) + "</td>";
    newContent += "<td>" + comma(short.q4_2_1) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅱ. 비유동부채</th>';
    newContent += "<td>" + comma(short.q1_2_2) + "</td>";
    newContent += "<td>" + comma(short.q2_2_2) + "</td>";
    newContent += "<td>" + comma(short.q3_2_2) + "</td>";
    newContent += "<td>" + comma(short.q4_2_2) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">부채총계</th>';
    newContent += "<td>" + comma(short.q1_2_1 + short.q1_2_2) + "</td>";
    newContent += "<td>" + comma(short.q2_2_1 + short.q2_2_2) + "</td>";
    newContent += "<td>" + comma(short.q3_2_1 + short.q3_2_2) + "</td>";
    newContent += "<td>" + comma(short.q4_2_1 + short.q4_2_2) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅰ. 자본금</th>';
    newContent += "<td>" + comma(short.q1_3_1) + "</td>";
    newContent += "<td>" + comma(short.q2_3_1) + "</td>";
    newContent += "<td>" + comma(short.q3_3_1) + "</td>";
    newContent += "<td>" + comma(short.q4_3_1) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅱ. 이익잉여금</th>';
    newContent += "<td>" + comma(short.q1_3_2) + "</td>";
    newContent += "<td>" + comma(short.q2_3_2) + "</td>";
    newContent += "<td>" + comma(short.q3_3_2) + "</td>";
    newContent += "<td>" + comma(short.q4_3_2) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅲ. 기타자본항목</th>';
    newContent += "<td>" + comma(short.q1_3_3) + "</td>";
    newContent += "<td>" + comma(short.q2_3_3) + "</td>";
    newContent += "<td>" + comma(short.q3_3_3) + "</td>";
    newContent += "<td>" + comma(short.q4_3_3) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">Ⅳ. 비지배지분</th>';
    newContent += "<td>" + comma(short.q1_3_4) + "</td>";
    newContent += "<td>" + comma(short.q2_3_4) + "</td>";
    newContent += "<td>" + comma(short.q3_3_4) + "</td>";
    newContent += "<td>" + comma(short.q4_3_4) + "</td>";
    newContent += "</tr>";
    newContent += "<tr>";
    newContent += '<th scope="row">자본총계</th>';
    newContent +=
      "<td>" +
      comma(short.q1_3_1 + short.q1_3_2 + short.q1_3_3 + short.q1_3_4) +
      "</td>";
    newContent +=
      "<td>" +
      comma(short.q2_3_1 + short.q2_3_2 + short.q2_3_3 + short.q2_3_4) +
      "</td>";
    newContent +=
      "<td>" +
      comma(short.q3_3_1 + short.q3_3_2 + short.q3_3_3 + short.q3_3_4) +
      "</td>";
    newContent +=
      "<td>" +
      comma(short.q4_3_1 + short.q4_3_2 + short.q4_3_3 + short.q4_3_4) +
      "</td>";
    newContent += "</tr>";
    newContent += "</tbody>";
    newContent += "</table>";

    document.getElementById("tableContent").innerHTML = newContent;
  } //함수 만들어 놓고... i번째 데이터 불러옴

  xhr.onload = function () {
    // When readystate changes

    if (xhr.status === 200) {
      // If server status was ok
      responseObject = JSON.parse(xhr.responseText); //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다.
      // parse() 메소드를 호출하여 자바스크립트 객체배열로 변환한다.
      ok(count); //ok 함수호출(count = 0일때)
    }
  }; //처음 페이지 로드

  //year click==============================================
  $(".selectBtn .selectTab").click(function (e) {
    e.preventDefault(); // <a> href="#" 값을 강제로 막는다
    var selectTab = $(this).html();

    $(".selectBox .selectBtn").fadeOut("fast");
    $(".selectBox .selectYear").removeClass("clicked");
    $(".selectYear").text(selectTab);

    count = $(this).index(".selectBtn .selectTab"); // 클릭시 해당 index를 뽑아준다

    ok(count); //ok 함수호출
  });

  xhr.open("GET", "./data/data.json", true); // 요청을 준비한다.
  xhr.send(null); // 요청을 전송한다
});
