<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
   //$$id = 'a';



    if(!$id) 
   {
      echo("<span style='color:red'>아이디를 입력하세요.</span>
      <script>
         $('#id').removeClass('good')
         $('#id').addClass('bad')
      </script>");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where id='$id' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if (strlen($id)<6 || strlen($id)>16) {
         echo "<span style='color:red'><i class='fa-solid fa-xmark'></i> 아이디는 6~16자 입니다.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      } else if (preg_match("/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/", $id)) {
         echo "<span style='color:red'> <i class='fa-solid fa-xmark'></i> 아이디는 영문+숫자만 가능합니다.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      } else if (preg_match("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", $id)) {
         echo "<span style='color:red'> <i class='fa-solid fa-xmark'></i> 아이디는 영문+숫자만 가능합니다.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      } else if (!preg_match("/(?=.*[a-zA-Z])(?=.*[0-9]).{6,16}/i", $id)) {
         echo "<span style='color:red'> <i class='fa-solid fa-xmark'></i> 아이디는 영문+숫자만 가능합니다.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      } else if ($num_record){
         echo "<span style='color:red'><i class='fa-solid fa-xmark'></i> 중복된 아이디입니다. 다른 아이디를 사용하세요.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      }else{
         echo "<span style='color:rgba(47, 71, 152, 1)'><i class='fa-solid fa-check' style='color : green;'></i> 사용가능한 아이디입니다.</span>
         <script>
            $('#id').removeClass('bad')
            $('#id').addClass('good')
         </script>";
      }

      }
      
    
 
      mysql_close();

?>

