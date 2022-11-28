<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

    <title>효성그룹 | 비밀번호찾기</title>

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="css/member.css">
    
    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_check.js"></script>

    <script
        src="https://kit.fontawesome.com/1b35f9429d.js"
        crossorigin="anonymous"
    ></script>
    <script>
        $(document).ready(function() {

            $(".find").click(function() {    // id입력 상자에 id값 입력시
                var id = $('.find_id').val(); //green2
                var name = $('.find_name').val(); //홍길동
                var hp1 = $('#hp1').val(); 
                var hp2 = $('#hp2').val(); 
                var hp3 = $('#hp3').val(); 

                $.ajax({
                    type: "POST",
                    url: "find2.php", /*매개변수인 check_id.php파일을 post방식으로 넘기세요*/
                    data: "id="+ id+ "&name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3,  /*매개변수id도 같이 넘겨줌*/
                    cache: false, 
                    success: function(data) /*이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감*/
                    {
                        $("#loadtext").html(data); /*span안에 있는 태그를 사용할것이기 때문에 html 함수사용*/
                        $('#loadtext').fadeIn();
                    }
                });
            // $("#loadtext").addClass('loadtexton'); 
            }); 

            $(document).on("click", ".popClose, .modalPopup", function(){
                    $("#loadtext").fadeOut();
                }); 
        

        });
    </script>

</head>
<body>
    <header>
        <h1>
            <a class="logo" href="../index.html">효성그룹
            </a>
        </h1>
    </header>

    <article id="content">
        <form  name="find" method="post" action="find2.php"> 
            <div id="title">
                <h2>비밀번호찾기</h2>
                <p>가입 시 입력하신 정보로 비밀번호를 찾아드립니다</p>
            </div>
            
            <div class="idInput">
                <div class="col_1">
                    <label for="id">아이디를 입력하세요</label>
                </div>
                <div class="col_2">
                    <input type="text" name="id" id="id" class="find_input find_id">
                </div>
            </div>

            <div class="nameInput">
                <div class="col_1">
                    <label for="name">이름을 입력하세요</label>
                </div>
                <div class="col_2">
                    <input type="text" name="name" id="name" class="find_input find_name">
                </div>
            </div>


            <div class="mbr_phone">
                <div class="col_1">휴대전화를 입력하세요</div>
                <div class="col_2">
                    <label class="hidden" for="hp1">연락처 앞3자리</label>
                    <select name="hp1" id="hp1" title="휴대폰 앞3자리를 선택하세요." class="find_input">
                        <option>010</option>
                        <option>011</option>
                        <option>016</option>
                        <option>017</option>
                        <option>018</option>
                        <option>019</option>
                    </select> -
                    <label class="hidden" for="hp2">연락처 가운데3자리</label>
                    <input class="find_input" type="text" id="hp2" name="hp2" title="연락처 가운데3자리를 입력하세요." maxlength="4"> -
                    <label class="hidden" for="hp3">연락처 마지막3자리</label>
                    <input class="find_input" type="text" id="hp3" name="hp3" title="연락처 마지막3자리를 입력하세요." maxlength="4">
                </div>
            </div>

            <div id="findPass_button">
                <input type="button" value="비밀번호찾기" class="find">
            </div>

            <span id="loadtext"></span>
                        
            <div class="go">
                <a href="id_find.php">아이디 찾기</a>
                <a href="login_form.php">로그인하기</a>
            </div>

            <div id="join_button">
                효성그룹 회원이 아니신가요?<a href="../member/join.html" class="go_join">회원가입</a>
            </div>
	    </form>

    </article> <!-- end of wrap -->
</body>
</html>