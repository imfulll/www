<?
   session_start();
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

  /*
    $name='홍길동'
    $hp1='010'
    $hp2='1111'
    $hp3='2222'
  */

   if(!$name) {  /* !='없으면'*/
     echo("
           <script>
             window.alert('이름을 입력하세요');
             document.find.name.focus();
           </script>
         ");
         exit;
   }

   if(!($hp2 && $hp3)) {
     echo("
           <script>
             window.alert('연락처를 입력하세요');
             document.find.hp2.focus();
           </script>
         ");
         exit;
   }


   include "../lib/dbconn.php";

   $sql = "select * from member where name='$name'";  //이름으로 검색
   $result = mysql_query($sql, $connect); //있으면 1, 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match) //검색 레코드가 없으면
   {
     echo(" 
           <script>
             window.alert('등록되지 않은 이름 입니다');
             document.find.name.focus();
           </script>
         ");
    }
    else     //검색 레코드가 있으면  
    {
         $hp = $hp1."-".$hp2."-".$hp3;  // 010-1111-2222
        
		     $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where name='$name' and hp='$hp'";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); //있으면 1, 없으면 null
     
  /* db에 이미 암호화 된 pass를 다시 암호화해서 기존의 pass로 알아낼수 없다,
  암호화된 pass가 입력된 pass의 암호화와 일치하는가를 확인해야함*/

        if(!$num_match) //이름은 있지만..전화번호가 일치하지 않으면
        {
           echo("
              <script>
                window.alert('등록된 정보가 없습니다');
                document.find.hp2.focus();
              </script>
           ");

           exit;
        }
        else  //1이면=이름과 전화번호가 모두 일치 한다면
        {
           $id = $row[id];
           $name = $row[name];
           $hp = $row[hp];
           $date = $row[regist_day];
          // 일반변수 사용가능

           echo // echo : 매개변수처럼 담아 html에 넘겨줌
          "<div class='textBox'>
            <div class='popTop'>
              <p><span>$name</span>님의 가입정보입니다.</p>
              <div>회원님의 아이디는 <span>$id</span>입니다.</div>
              <a class='popClose'><i class='fa-solid fa-xmark'></i></a>
            </div>
            <div class='popBot'>
              <dl>
                <dt>아이디</dt>
                <dd>$id</dd>
              </dl>
              <dl>
                <dt>이름</dt>
                <dd>$name</dd>
              </dl>
              <dl>
                <dt>휴대전화</dt>
                <dd>$hp</dd>
              </dl>
              <dl>
                <dt>가입일자</dt>
                <dd>$date</dd>
              </dl>
            </div>
            <div class='popBtn'>
              <a href='./pw_find.php' class='findPass'>비밀번호 찾기</a>
              <a href='./login_form.php' class='goLogin'>로그인</a>
            </div>
          </div>
          <div class='modalPopup'></div>"
           

           ;
        }
   }          
?>
