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
$id='green2'
$name='홍길동'
$hp1='010'
$hp2='1111'
$hp3='2222'
  */


  if(!$id) {  /* !='없으면'*/
    echo("
        <script>
          window.alert('아이디를 입력하세요');
          document.find.id.focus();
        </script>
      ");
    exit;
  }
  
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

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect); //있으면 1, 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match) //검색 레코드가 없으면
   {
     echo(" 
           <script>
             window.alert('등록되지 않은 아이디 입니다');
             document.find.id.focus();
           </script>
         ");
    }
    else     //검색 레코드가 있으면
    {
         $hp = $hp1."-".$hp2."-".$hp3;
        
		     $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id' and name='$name' and hp='$hp'";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); //있으면 1, 없으면 null
     
  /* db에 이미 암호화 된 pass를 다시 암호화해서 기존의 pass로 알아낼수 없다,
  암호화된 pass가 입력된 pass의 암호화와 일치하는가를 확인해야함*/

        if(!$num_match) //null이면=입력된 pass가 암호화된 패스와 맞지 않다면
        {
           echo("
              <script>
                window.alert('등록된 정보가 없습니다');
                document.find.name.focus();
              </script>
           ");

           exit;
        }
        else  //1이면=아이디와 이름 전화번호가 모두 일치 한다면
        {
           $userid = $row[id];
           $username = $row[name];
           $userhp = $row[hp];
           $date = $row[regist_day];

        function generateRandomPassword($length=8, $strength=0) {
            $vowels = 'aeuy';
            $consonants = 'bdghjmnpqrstvz';  //랜덤으로 뽑아낼 기본 문자
            if ($strength & 1) {
                $consonants .= 'BDGHJLMNPQRSTVWXZ0123456789!@#$';  //추가할 문자 입력
            }

            $password = '';
            $alt = 0; //첫글자 영문을 위해
            // $alt = time() % 2;
            for ($i = 0; $i < $length; $i++) {
                if ($alt == 1) {
                    $password .= $consonants[(rand() % strlen($consonants))];
                    $alt = 0;
                } else {
                    $password .= $vowels[(rand() % strlen($vowels))];
                    $alt = 1;
                }
            }
            
            return $password;
        }

        $ranpass = generateRandomPassword(8,1);  //랜덤으로 뽑은 8자의 문자
            
        echo " <div class='textBox'>
        <div class='popTop'>
          <p><span>$username</span>님의 가입정보입니다.</p>
          <div>회원님의 임시비밀번호는 <span>$ranpass</span>입니다.</div>
          <a class='popClose'><i class='fa-solid fa-xmark'></i></a>
        </div>
        <div class='popBot'>
          <dl>
            <dt>아이디</dt>
            <dd>$userid</dd>
          </dl>
          <dl>
            <dt>이름</dt>
            <dd>$username</dd>
          </dl>
          <dl>
            <dt>휴대전화</dt>
            <dd>$userhp</dd>
          </dl>
          <dl>
            <dt>가입일자</dt>
            <dd>$date</dd>
          </dl>
        </div>
        <div class='popBtn'>
          <a href='./id_find.php' class='findPass'>아이디 찾기</a>
          <a href='./login_form.php' class='goLogin'>로그인</a>
        </div>
      </div>
      <div class='modalPopup'></div>";
            
        $sql = "update member set pass=password('$ranpass') where id='$id' and name='$name' and hp='$hp'";
        $result = mysql_query($sql, $connect);
        }
        
        
   }          
?>
