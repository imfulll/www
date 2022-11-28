<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />

    <title>효성 | 회원가입</title>

    <link rel="stylesheet" href="../common/css/common.css">
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
                success: 
                function(data){
                    $("#loadtext").html(data);
                }
            });

        });

        //password 형식검사		 
        $("#pass").keyup(function() {    // id입력 상자에 id값 입력시
            var pass = $('#pass').val();
            var passCheck = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*])(?=.*[0-9]).{8,15}$/;

            if(pass.length < 6 || pass.length > 15){
                $("#loadtext2_1").html("<span style='color:red'><i class='fa-solid fa-xmark'></i> 비밀번호 형식을 확인해주세요.</span>");
                $("#pass").removeClass("good")
                $("#pass").addClass("bad")
            } else if (!passCheck.test(pass)) {
                $("#loadtext2_1").html("<span style='color:red'><i class='fa-solid fa-xmark'></i> 비밀번호 형식을 확인해주세요.</span>");
                $('#pass').removeClass('good')
                $('#pass').addClass('bad')
            } else{
                $("#loadtext2_1").html("<span style='color: rgba(47, 71, 152, 1)'><i class='fa-solid fa-check' style='color : green;'></i> 사용가능한 비밀번호입니다.</span>");
                $("#pass").removeClass("bad")
                $("#pass").addClass("good")
            }
        });		

        //password 확인검사		 
        $("#pass_confirm").keyup(function() {    // id입력 상자에 id값 입력시
            var pass = $('#pass').val();
            var pass_confirm = $('#pass_confirm').val();

            if(pass == pass_confirm){
                $("#loadtext2_2").html("<span style='color: rgba(47, 71, 152, 1)'><i class='fa-solid fa-check' style='color : green;'></i> 비밀번호가 일치합니다.</span>");
                $("#pass_confirm").removeClass("bad")
                $("#pass_confirm").addClass("good")
            } else{
                $("#loadtext2_2").html("<span style='color:red'><i class='fa-solid fa-xmark'></i> 비밀번호가 일치하지 않습니다.</span>");
                $("#pass_confirm").removeClass("good")
                $("#pass_confirm").addClass("bad")
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
            var id = document.getElementById("id");
            var pass = document.getElementById("pass");
            var pass_confirm = document.getElementById("pass_confirm");
            var name = document.getElementById("name");
            var nick = document.getElementById("nick");
            var hp1 = document.getElementById("hp1");
            var hp2 = document.getElementById("hp2");
            var hp3 = document.getElementById("hp3");
            var email1 = document.getElementById("email1");
            var email2 = document.getElementById("email2");

        if (!id.value){
            alert("아이디를 입력하세요");    
            id.focus();
            return;
        }

        if (!pass.value){
            alert("비밀번호를 입력하세요");    
            pass.focus();
            return;
        }

        if (!pass_confirm.value){
            alert("비밀번호확인을 입력하세요");    
            pass_confirm.focus();
            return;
        }

        if (!name.value){
            alert("이름을 입력하세요");    
            name.focus();
            return;
        }

        if (!nick.value){
            alert("닉네임을 입력하세요");    
            nick.focus();
            return;
        }


        if (!hp2.value || !hp3.value ){
            alert("휴대폰 번호를 입력하세요");    
            hp2.focus();
            return;
        }

        if (!email1.value || !email2.value ){
            alert("이메일을 입력하세요");    
            email1.focus();
            return;
        }


        var idCheck = /(?=.*[a-zA-Z])(?=.*[0-9]).{6,16}/;
        if (!idCheck.test(id.value)) {
            alert(`아이디는 영문자+숫자 조합으로 6~16자리 사용해야 합니다.`);
            id.focus();
            return;
        };

        var passCheck = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*])(?=.*[0-9]).{8,15}$/;
        if (!passCheck.test(pass.value)) {
            alert(`비밀번호는 영문자+숫자+특수문자 조합으로 8~15자리 사용해야 합니다.
            특수문자는 !@#$%^*만 사용가능합니다.`);
            pass.focus();
            return;
        };

        if (pass.value != pass_confirm.value){
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
            document.member_form.pass.focus();
            document.member_form.pass.select();
            return;
        }
        
        var phoneCheck = /^[0-9]+/g; //숫자만 입력하는 정규식
        if (!phoneCheck.test(hp2.value || hp3.value)) {
            alert("전화번호는 숫자만 입력할 수 있습니다.");
            hp2.focus();
            return;
        }

        dotCheck = email2.value.lastIndexOf(".");
        if (dotCheck < 3) {
            alert("이메일 형식을 확인해주세요.");
            email2.focus();
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
        $("#id, #pass, #pass_confirm, #nick").removeClass("good")
        $("#id, #pass, #pass_confirm, #nick").removeClass("bad")
        $("#loadtext, #loadtext2_1, #loadtext2_2, #loadtext3").html("")

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
                        <label for="id"><span>*</span>아이디<span style="font-size:0.8em;"> (영문자+숫자 조합으로 6~16자)</span></label>
                    </div>
                    <div class="col_2">
                        <input type="text" name="id" id="id" required>
                        <span id="loadtext"></span>
                    </div>
                </div>
                <div class="row mbr_pass">
                    <div class="col_1">
                        <label for="pass"><span>*</span>비밀번호<span style="font-size:0.8em;"> (영문자+숫자+특수문자 조합으로 8~15자)</span></label>
                    </div>
                    <div class="col_2">
                        <input type="password" name="pass" id="pass" required>
                        <span id="loadtext2_1"></span>
                    </div>
                </div>
                <div class="row mbr_pass_con">
                    <div class="col_1">
                        <label for="pass_confirm"><span>*</span>비밀번호확인</label>
                    </div>
                    <div class="col_2">
                        <input type="password" name="pass_confirm" id="pass_confirm" required>
                        <span id="loadtext2_2"></span>
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
                        <label for="nick"><span>*</span>닉네임<span style="font-size:0.8em;"> (6자 이상)</span></label>
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


