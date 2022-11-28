<? 
	session_start(); 
	/**
	 * $num = 1  >  게시글 
	 * $page / $scale
	 * 
	 */
	
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

	include "../../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       
	// 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
	$item_nick    = $row[nick];
	$item_area    = $row[area];
	$item_hit     = $row[hit];
	$item_regist    = $row[regist_day];
	$item_regi_date = substr($item_regist, 0, 10); 
	$item_due    = $row[due_day];
	$item_due_date = substr($item_due, 0, 10); 
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$item_content = str_replace(" ", "&nbsp;", $item_content);
	$item_content = str_replace("\n", "<br>", $item_content);

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
		<link rel="stylesheet" href="../css/sub5_content5.css" />
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

		<!-- 본문컨텐츠 영역 -->
		<div class="contentArea">

			<div class="view">

				<div class="viewBox">
					<div class="viewTitle1">
						<span>[ <?= $item_area ?> ]</span> <?= $item_subject ?>
					</div>
					
					<div class="viewTitle2">
						<div class="viewLeft">
							<span>작성자 : <?= $item_nick ?></span> / <span>공고등록 : <?= $item_regi_date ?></span> / <span><i class="fa-solid fa-eye"></i> <?= $item_hit ?></span>
						</div>
						<div class="viewRight">
							접수마감 : <?= $item_due_date ?> (<span id="dDay"></span>)
						</div>
					</div>
					
					<div class="viewContent">
						<?= $item_content ?>
					</div>
				</div>
				
				<div class="viewButton">
						<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
					<? 
						// 관리자, 글쓴이 글 수정, 삭제
						if($userid==$item_id || $userlevel==1 || $userid=="admin")
						{
					?>
						<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
						<a href="javascript:del('delete.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>')" class="delete">삭제</a>
					<?
						}
					?>
					<? 
						if($userid )
						{
					?>
						<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>" class="write">글쓰기</a>
					<?
						}
					?>
				</div>
			</div>
		</div>

	</article>
	<script>
		function del(href) 
    {
			if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
				document.location.href = href;
			}
    }


		let dday = new Date("<?= $item_due_date ?>");
		let today = new Date();

		let count = dday - today

		let countDay = String(Math.floor(count / (1000*60*60*24)));


		if(countDay <= -1){
			document.getElementById("dDay").innerHTML = "접수마감";
			document.getElementById("dDay").style.color = "red";
		} else{
			document.getElementById("dDay").innerHTML = countDay + "일 남음";
		}

	</script>


<? include "../../common/sub_footer_board.html" ?>
</body>
</html>