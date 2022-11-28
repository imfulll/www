<?
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
      include "../../lib/dbconn.php";

      $sql = "delete from comment where num=$comment_num";
      mysql_query($sql, $connect);
      mysql_close();

      echo "
	   <script>
	     	location.href = 'view.php?table=$table&num=$num&page=$page&scale=$scale';
	   </script>
	  ";
?>
