<? 
	session_start(); 

    @extract($_GET); 

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

</head>
<body>
    <header>
        <h1>
            <a class="logo" href="../index.html">효성그룹
            </a>
        </h1>
    </header>
    <article id="content">  
        <div class="memberCompleteForm">
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
            <h2>회원가입 완료</h2>
            <p><span><?=$name?></span>님 회원가입이 완료되었습니다.</p>
            <div class="lastBtn">
                <!-- <a href="#" class="reset" onclick="goback()">수정취소</a> -->
                <a href="../index.html" class="goMain">메인으로</a>
                <a href="../login/login_form.php" class="goLogin">로그인</a>
            </div>
        </div>
    </article>
    <? include "../common/subfoot.html" ?>
</body>
</html>


