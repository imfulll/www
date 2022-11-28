<? 
	session_start();
?>

<meta charset="utf-8">

<?
@extract($_GET); 
@extract($_POST); 
@extract($_SESSION);

/*
	새글저장
	$html_ok = 'y'
	$subject = '제목글'
	$content = '본문글'
*/ 
/*
	수정 글저장
	get
		mode = modify > 사실 모드가 안넘어와도 num으로 차별 가능
		num = 2

	post
		subject = '제목'
		content = '내용글'
*/ 

	//null값처리
	if(!$due) {
		echo("
	   <script>
	     window.alert('접수마감일을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	if(!$subject) {
		echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}



	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	include "../../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify") // 수정글쓰기
	{
    $subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "update greet set subject='$subject', content='$content', area='$bussArea', due_day='$due' where num=$num";

		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
		mysql_close();                // DB 연결 끊기
	
		echo "
			<script>
				alert('채용공고가 수정되었습니다.')
				location.href = 'list.php?page=$page&scale=$scale';
			</script>
		";
	}
	else // 새글쓰기
	{
		$is_html = "";
		
		//htmlspecialchars > 존나중요
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
	 //  "(&quot;) '(&#039;) &(&amp;) <(&lt;) >(&gt;)

		$sql = "insert into greet (id, name, nick, area, due_day, subject, content, regist_day, hit) ";
		$sql .= "values('$userid', '$username', '$usernick', '$bussArea','$due', '$subject', '$content', '$regist_day', 0)";

		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
		mysql_close();                // DB 연결 끊기
	
		echo "
			<script>
				alert('채용공고가 게시되었습니다.')
				location.href = 'list.php?page=$page&scale=$scale';
			</script>
		";
	}
?>

  
