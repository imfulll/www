<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

    <title>효성그룹 | 회원정보수정</title>

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="./css/modify.css">

    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_check_modify.js"></script>

    <script>
    $(document).ready(function() {       
        //password 확인검사		 
        $("#pass_confirm, #pass").keyup(function() {    // id입력 상자에 id값 입력시
            var pass = $('#pass').val();
            var pass_confirm = $('#pass_confirm').val();

            if(pass == pass_confirm){
                $("#loadtext2").html("<span style='color: rgba(47, 71, 152, 1)'>비밀번호가 일치합니다.</span>");
                $("#pass, #pass_confirm").removeClass("bad")
                $("#pass, #pass_confirm").addClass("good")
            } else{
                $("#loadtext2").html("<span style='color:red'>비밀번호가 일치하지 않습니다.");
                $("#pass, #pass_confirm").removeClass("good")
                $("#pass, #pass_confirm").addClass("bad")
            }
        });		
    });
    </script>

    <script>
        function check_input()
        {
            if (!document.member_form.pass.value)
            {
                alert("비밀번호를 입력하세요");    
                document.member_form.pass.focus();
                return;
            }

            if (!document.member_form.pass_confirm.value)
            {
                alert("비밀번호확인을 입력하세요");    
                document.member_form.pass_confirm.focus();
                return;
            }

            if (!document.member_form.name.value)
            {
                alert("이름을 입력하세요");    
                document.member_form.name.focus();
                return;
            }

            if (!document.member_form.nick.value)
            {
                alert("닉네임을 입력하세요");    
                document.member_form.nick.focus();
                return;
            }

            if (!document.member_form.hp2.value || !document.member_form.hp3.value )
            {
                alert("휴대폰 번호를 입력하세요");    
                document.member_form.nick.focus();
                return;
            }

            if (document.member_form.pass.value != 
                    document.member_form.pass_confirm.value)
            {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form()
        {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp1.value = "010";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";
            
            document.member_form.id.focus();

            return;
        }
        function goback(){
            history.go(-1);
        }

    </script>
</head>
<?
    include "../lib/dbconn.php";

    // 페이지 들어오자마자 session변수로 정보 불러와서 변수로 만들어줌
    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
    <header>
        <h1>
            <a class="logo" href="../index.html">효성그룹</a>
        </h1>
    </header>

    <article id="content">
        <form  name="member_form" method="post" action="modify.php"> 
            <div id="title">
                <h2>회원정보수정</h2>
            </div>

            <div class="row mbr_id">
                <div class="col_1 focus">
                    <label for="id">아이디</label>
                </div>
                <div class="col_2 focus">
                    <input type="text" name="id" id="id" value="<?= $row[id] ?>" disabled>
                </div>
            </div>
            <div class="row mbr_pass">
                <div class="col_1">
                    <label for="pass">비밀번호</label>
                </div>
                <div class="col_2">
                    <input type="password" name="pass" id="pass" value="">
                </div>
            </div>
            <div class="row mbr_pass_con">
                <div class="col_1">
                    <label for="pass_confirm">비밀번호확인</label>
                </div>
                <div class="col_2">
                    <input type="password" name="pass_confirm" id="pass_confirm" value="">
                    <span id="loadtext2"></span>
                </div>
            </div>
            <div class="row mbr_name">
                <div class="col_1 focus">
                    <label for="name">이름</label>
                </div>
                <div class="col_2 focus">
                    <input type="text" name="name" id="name"  value="<?= $row[name] ?>">
                </div>
            </div>
            <div class="row mbr_nick">
                <div class="col_1 focus">
                    <label for="nick">닉네임</label>
                </div>
                <div class="col_2 focus">
                    <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>" disabled>
                </div>
            </div>
            <div class="row mbr_phone">
                <div class="col_1">휴대전화</div>
                <div class="col_2">
                    <label class="hidden" for="hp1">전화번호앞3자리</label>
                    <select class="hp" name="hp1" id="hp1"> 
                        <option value='010'<? if($hp1 == '010') echo "selected";?> >010</option>
                        <option value='011'<? if($hp1 == '011') echo "selected";?> >011</option>
                        <option value='016'<? if($hp1 == '016') echo "selected";?> >016</option>
                        <option value='017'<? if($hp1 == '017') echo "selected";?> >017</option>
                        <option value='018'<? if($hp1 == '018') echo "selected";?> >018</option>
                        <option value='019'<? if($hp1 == '019') echo "selected";?> >019</option>
                    </select>  - 
                    <label class="hidden" for="hp2">전화번호중간4자리</label>
                    <input type="text" class="hp" name="hp2" id="hp2"  value="<?= $hp2 ?>" > - 
                    <label class="hidden" for="hp3">전화번호끝4자리</label>
                    <input type="text" class="hp" name="hp3" id="hp3"  value="<?= $hp3 ?>" >
                </div>
            </div>
            <div class="row mbr_email">
                <div class="col_1">이메일</div>
                <div class="col_2">
                    <label class="hidden" for="email1">이메일아이디</label>
                    <input type="text" id="email1" name="email1" value="<?= $email1 ?>" required> @ 
                    <label class="hidden" for="email2">이메일주소</label>
                    <input type="text" name="email2" id="email2" value="<?= $email2 ?>" required>
                </div>
            </div>
            <div class="lastBtn">
                <!-- <a href="#" class="reset" onclick="goback()">수정취소</a> -->
                <a href="#" class="reset" onclick="reset_form()">다시작성</a>
                <a href="#" class="submit" onclick="check_input()">수정하기</a>
            </div>
        </form>
    </article>
</body>
</html>
