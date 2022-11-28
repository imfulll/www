<? 
	session_start(); 
	
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 
?>
<!DOCTYPE html>
<html lang="ko">
	<head> 
		<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>효성 | 인재채용_채용공고</title>

		<link rel="stylesheet" href="../../common/css/common.css">
    <link rel="stylesheet" href="../common/css/sub5common.css">
		<link rel="stylesheet" href="../css/sub5_content5.css">
		<link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico">

		<script
      src="https://kit.fontawesome.com/1b35f9429d.js"
      crossorigin="anonymous"
    ></script>
		<script src="../../common/js/prefixfree.min.js"></script>

	</head>

<body>
	<? include "../../common/sub_header_board.html" ?>

	<div class="main">
		<img src="../common/images/main.jpg" alt="" />
		<h3>인재채용</h3>
		<p>언제나 당신 곁에 함께하는 기업</p>
	</div>

	<div class="subNav">
		<ul>
			<li><a href="../sub5_1.html">인재상</a></li>
			<li><a href="../sub5_2.html">인사제도</a></li>
			<li><a href="../sub5_3.html">인재양성</a></li>
			<li><a href="../sub5_4.html">채용절차</a></li>
			<li><a href="./list.php" class="current">채용공고</a></li>
		</ul>
	</div>

	<article id="content">
		<div class="titleArea">
			<div class="lineMap">
				<span><i class="fa-solid fa-house"></i> HOME</span> &gt;
				<span>인재채용</span> &gt;
				<span>채용공고</span>
			</div>
			<h2>채용공고</h2>
			<p>창의적이고 강한 도전정신을 갖춘 젊은 인재를 위해 효성의 문은 언제나 활짝 열려 있습니다.</p>
			<i class="fa-solid fa-chevron-down"></i>
			<i class="fa-solid fa-chevron-down"></i>
			<i class="fa-solid fa-chevron-down"></i>
		</div>

		<div class="contentArea">
			<h3>채용공고 작성</h3>
			<form  name="board_form" method="post" action="insert.php?page=<?=$page?>&scale=<?=$scale?>" class="writeBox">
				<div class="inputBox">
					<div class=>
						<label for="nick">작성자</label>
						<input type="text" value="<?=$usernick?>" name="nick" id="nick" disabled>
					</div>
					<div>
						<label for="bussArea">모집분야</label>
						<select name="bussArea" id="bussArea">
							<option value='효성티앤씨(주)'>효성티앤씨(주)</option>
							<option value='효성중공업(주)'>효성중공업(주)</option>
							<option value='효성첨단소재(주)'>효성첨단소재(주)</option>
							<option value='효성화학(주)'>효성화학(주)</option>
							<option value='효성굿스프링스(주)'>효성굿스프링스(주)</option>
							<option value='효성티앤에스(주)'>효성티앤에스(주)</option>
						</select>
					</div>
					<div class="due">
						<label for="due">접수마감</label>
						<input type="datetime-local" name="due" id="due">
					</div>
					<div>
						<label for="subject">제목</label>
						<input type="text" name="subject" id="subject">
					</div>
					<div>
						<label for="content">내용</label>
						<textarea name="content" id="content"></textarea>
					</div>
				</div>

				<div class="writeButton">
					<button href="insert.php?page=<?=$page?>&scale=<?=$scale?>">게시하기</button>
					<a href="javascript:writeCancel('list.php?page=<?=$page?>&scale=<?=$scale?>')">목록으로</a>
				</div>
			</form>
		</div>
	</article>

	<script>
		var d= new Date(); // 출력형태 Tue Feb 07 2020 23:25:32 GMT+0900 (KST)
		let setMin = new Date((d.getTime() + 86400000) - (d.getTimezoneOffset() * 60000)).toISOString().slice(0, 10) + "T00:00:00";
		let dateInput = document.getElementById("due");

		dateInput.min = setMin;

		function writeCancel(href) 
    {
			if(confirm("작성된 내용이 저장되지 않았습니다.\n\n목록으로 돌아가시겠습니까?")) {
				document.location.href = href;
			}
    }
		</script>

	<? include "../../common/sub_footer_board.html" ?>
</body>
</html>