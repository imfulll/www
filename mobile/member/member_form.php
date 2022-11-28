<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>효성그룹 | 회원가입</title>

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="./css/member_check.css">

    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_check.js"></script>
    
    <script
      src="https://kit.fontawesome.com/1b35f9429d.js"
      crossorigin="anonymous"
    ></script>
    
    <script>
    $(document).ready(function() {

        //id 중복검사
        $("#id").keyup(function() {    // id입력 상자에 id값 입력시
            var id = $('#id').val(); //aaa

            $.ajax({
                type: "POST",
                url: "check_id.php",
                data: "id="+ id,  
                cache: false, 
                success: function(data)
                {
                    $("#loadtext").html(data);
                }
            });

        });
        
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

        //nick 중복검사		 
        $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
            var nick = $('#nick').val();

            $.ajax({
            type: "POST",
            url: "check_nick.php",
            data: "nick="+ nick,  
            cache: false, 
            success: function(data)
            {
            $("#loadtext3").html(data);
            }
            });
        });		 

    });

    </script>

    <script>
    function check_input(){
        if (!document.member_form.id.value){
            alert("아이디를 입력하세요");    
            document.member_form.id.focus();
            return;
        }

        if (!document.member_form.pass.value){
            alert("비밀번호를 입력하세요");    
            document.member_form.pass.focus();
            return;
        }

        if (!document.member_form.pass_confirm.value){
            alert("비밀번호확인을 입력하세요");    
            document.member_form.pass_confirm.focus();
            return;
        }

        if (!document.member_form.name.value){
            alert("이름을 입력하세요");    
            document.member_form.name.focus();
            return;
        }

        if (!document.member_form.nick.value){
            alert("닉네임을 입력하세요");    
            document.member_form.nick.focus();
            return;
        }


        if (!document.member_form.hp2.value || !document.member_form.hp3.value ){
            alert("휴대폰 번호를 입력하세요");    
            document.member_form.nick.focus();
            return;
        }

        if (document.member_form.pass.value != document.member_form.pass_confirm.value){
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
            document.member_form.pass.focus();
            document.member_form.pass.select();
            return;
        }

    document.member_form.submit(); 
    // insert.php 로 변수 전송
    }

    function reset_form(){
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
        <div class="memberForm">
            <ul class="process">
                <li>
                    이용약관 동의 
                    <i class="fa-solid fa-angles-right"></i>
                </li>
                <li>
                    계정 생성    
                    <i class="fa-solid fa-angles-right"></i>
                </li>
                <li>
                    회원가입 완료    
                </li>
            </ul>
            <h2>회원가입</h2>
            <p><span>*</span>필수 입력 정보입니다.</p>
            <form  name="member_form" medivod="post" action="insert.php"> 
                <div class="row mbr_id">
                    <div class="col_1">
                        <label for="id"><span>*</span>아이디</label>
                    </div>
                    <div class="col_2">
                        <input type="text" name="id" id="id" required>
                        <span id="loadtext"></span>
                    </div>
                </div>
                <div class="row mbr_pass">
                    <div class="col_1">
                        <label for="pass"><span>*</span>비밀번호</label>
                    </div>
                    <div class="col_2">
                        <input type="password" name="pass" id="pass" required>
                    </div>
                </div>
                <div class="row mbr_pass_con">
                    <div class="col_1">
                        <label for="pass_confirm"><span>*</span>비밀번호확인</label>
                    </div>
                    <div class="col_2">
                        <input type="password" name="pass_confirm" id="pass_confirm" required>
                        <span id="loadtext2"></span>
                    </div>
                </div>
                <div class="row mbr_name">
                    <div class="col_1">
                        <label for="name"><span>*</span>이름</label>
                    </div>
                    <div class="col_2">
                        <input type="text" name="name" id="name" required>
                    </div>
                </div>
                <div class="row mbr_nick">
                    <div class="col_1">
                        <label for="nick"><span>*</span>닉네임</label>
                    </div>
                    <div class="col_2">
                        <input type="text" name="nick" id="nick"  required>
                        <span id="loadtext3"></span>
                    </div>
                </div>
                <div class="row mbr_phone">
                    <div class="col_1"><span>*</span>휴대전화</div>
                    <div class="col_2">
                        <label class="hidden" for="hp1">전화번호앞3자리</label>
                        <select class="hp" name="hp1" id="hp1"> 
                            <option value='010'>010</option>
                            <option value='011'>011</option>
                            <option value='016'>016</option>
                            <option value='017'>017</option>
                            <option value='018'>018</option>
                            <option value='019'>019</option>
                        </select>  - 
                        <label class="hidden" for="hp2">전화번호중간4자리</label>
                        <input type="text" class="hp" name="hp2" id="hp2"  required> - 
                        <label class="hidden" for="hp3">전화번호끝4자리</label>
                        <input type="text" class="hp" name="hp3" id="hp3"  required>
                    </div>
                </div>
                <div class="row mbr_email">
                    <div class="col_1"><span>*</span>이메일</div>
                    <div class="col_2">
                        <label class="hidden" for="email1">이메일아이디</label>
                        <input type="text" id="email1" name="email1"  required> @ 
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2"  required>
                    </div>
                </div>
                <div class="lastBtn">
                    <a href="#" class="reset" onclick="reset_form()">다시작성</a>
                    <a href="#" class="submit" onclick="check_input()">회원가입</a>
                </div>
            </form>
        </div>
    </article>
    <? include "../common/subfoot.html" ?>
</body>
</html>


