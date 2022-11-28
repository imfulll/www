$(document).ready(function(){

    //전역변수
    var value, key;

    function getParams() {
        // 현재 페이지의 url   ex2.html?num=1
        var url = decodeURIComponent(location.href);
        // url이 encodeURIComponent 로 인코딩 되었을때는 다시 디코딩 해준다.
        url = decodeURIComponent(url); //  ex2.html?num=1 //한번더 넣어주는게 좋음

        console.log(url)
        var params = "";
        // url에서 '?' 문자 이후의 파라미터 문자열까지 자르기
        params = url.substring(url.indexOf("?") + 1, url.length);
        // 'abcdefg'.substring(2,4);=> 'cdef'
        //indexOf("a") : a를 찾아서 인덱스 번호를 리턴해주는 함수
        //url의 갯수(아무리 길어봤자 url보단 짧으니...)
        // params = "num=1"

        //split("a") : a를 찾아서 앞은 배열0 뒤는 배열1
        key = params.split("=")[0]; //'num'
        value = params.split("=")[1]; // '1'

        key = Number(value);

        //alert(key);
        //alert(typeof(key));
      }

      getParams(); //함수호출


    // tab on with 매개변수
    $('.continent li').removeClass('current');

    if(key > 0 || key < 6){
        $('.continent li:eq('+ key +')').addClass('current');
        $(".mapImg img:eq("+ key +")").fadeIn("slow")
        $(".worldTable ul li:eq("+ key +")").fadeIn("slow")
    } else {
        $(".continent li:eq(0)").addClass("current");
        $(".mapImg img:eq(0)").fadeIn();
        $(".worldTable ul li:eq(0)").fadeIn();
    }
    
    // ======================================================

    $(".continent li a").click(
        function(e){
          e.preventDefault()
          
          var ind = $(this).index(".continent li a");
          
        $(".continent li").removeClass("current");
        $(this).parents().addClass("current");
        $(".mapImg img").hide()
        $(".mapImg img:eq("+ind +")").show()
        $(".worldTable ul li").hide()
        $(".worldTable ul li:eq("+ ind +")").fadeIn("slow")
        
        
      });
});