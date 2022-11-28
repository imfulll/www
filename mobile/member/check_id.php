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


     
      if ($num_record)
      {
         echo "<span style='color:red'>다른 아이디를 사용하세요.</span>
         <script>
            $('#id').removeClass('good')
            $('#id').addClass('bad')
        </script>";
      }
      else
      {
         echo "<span style='color:rgba(47, 71, 152, 1)'>사용가능한 아이디입니다.</span>
         <script>
            $('#id').removeClass('bad')
            $('#id').addClass('good')
         </script>";
      }
      
    
 
      mysql_close();
   }

?>

