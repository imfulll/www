<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

    <title>효성 | 로그인</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/login.css">

    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_check.js"></script>

    <script
      src="https://kit.fontawesome.com/1b35f9429d.js"
      crossorigin="anonymous"
    ></script>

</head>
<body>
    <header>
        <h1>
            <a class="logo" href="../index.html">효성그룹
            </a>
        </h1>
    </header>
    <article id="content">
        <form  name="member_form" method="post" action="login.php"> 
            <div id="title">
                <h2>로그인</h2>
                <p>가입 시 등록한 아이디와 비밀번호를 입력해주세요.</p>
            </div>
            <div id="formInput">
                <div class="idInput">
                    <div class="col_1">
                        <label for="id">아이디를 입력하세요</label>
                    </div>
                    <div class="col_2">
                        <input type="text" name="id" id="id" required>
                    </div>
                </div>
                
                <div class="passInput">
                    <div class="col_1">
                        <label for="pass">비밀번호를 입력하세요</label>
                    </div>
                    <div class="col_2">
                        <input type="password" name="pass" id="pass" required>
                    </div>
                </div>
            </div>
            <div id="login_button">
                <button type="submit">로그인</button>
            </div>
            <div class="find">
                <a href="id_find.php">아이디 찾기</a>
                <a href="pw_find.php">비밀번호 찾기</a>
            </div>
            <div id="join_button">
                아직 효성그룹 회원이 아니신가요? <a href="../member/join.html">회원가입</a> 하러가기
            </div>
        </form>
    </article>
</body>
</html>