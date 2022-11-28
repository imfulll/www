<?
   session_start();
?>
<meta charset="utf-8">
<?
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

   include "../../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d H:i");  // 현재의 '년-월-일-시-분'을 저장

   // 레코드 삽입 명령
   $sql = "insert into comment (parent, id, name, nick, content, regist_day) ";
   $sql .= "values($num, '$userid', '$username', '$usernick', '$comment_content', '$regist_day')";    
   
   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   mysql_close();                // DB 연결 끊기

   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num&page=$page&scale=$scale';
	   </script>
	";
?>

   
