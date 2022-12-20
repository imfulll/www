<? 
	session_start(); 
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
<?
	@extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

	include "../../lib/dbconn.php";

	if(!$scale)
		$scale=10;			// 한 화면에 표시되는 글 수

	if ($mode=="search") //검색
		{
			if(!$search && !$select1)
			{
				echo("
					<script>
						window.alert('검색할 단어를 입력해 주세요');
						location.href = './list.php'
					</script>
				");
				exit;
			} 

			if(!$select1){
				$sql = "select * from greet where $select2 like '%$search%' order by num desc";
			} else{
				$sql = "select * from greet where area = '$select1' and $select2 like '%$search%' order by num desc";
			}
		}
		else
		{
			$sql = "select * from greet order by num desc";
		}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	//페이지주소 파라미터로 넘어왔을때 암것도 없으면 1페이지
	if (!$page)       // 페이지번호($page)가 0 일 때
		$page = 1;      // 페이지 번호를 1로 초기화
 
	//레코드 시작번호(0번부터 시작), 표시할 페이지($page)에 따라 $start 계산
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

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

			<form  name="board_form" method="post" action="list.php?mode=search" class="searchBox"> 
				<div>
					<div class="areaSel">
						<label for="select1" class="hidden">사업분야</label>
						<select name="select1" id="select1">
							<option value='' >전체</option>
							<option value='효성티앤씨(주)'>효성티앤씨(주)</option>
							<option value='효성중공업(주)'>효성중공업(주)</option>
							<option value='효성첨단소재(주)'>효성첨단소재(주)</option>
							<option value='효성화학(주)'>효성화학(주)</option>
							<option value='효성굿스프링스(주)'>효성굿스프링스(주)</option>
							<option value='효성티앤에스(주)'>효성티앤에스(주)</option>
						</select>
					</div>
					<div class="searchSel">
						<label for="select2" class="hidden">검색영역선택</label>
						<select name="select2" id="select2">
							<option value='subject'>제목</option>
							<option value='content'>내용</option>
						</select>
					</div>
					<div class="searchInput">
						<label for="search" class="hidden">검색어입력</label>
						<input type="text" name="search" id="search" placeholder="검색어를 입력하세요">
						<button>검색</button>
					</div>
				</div>
			</form>
				
			<div class="tableTop">
				<p>총 <span><?= $total_record ?></span> 개의 게시물이 있습니다.</p>
				<label for="scale" class="hidden">보기설정</label>
				<select id="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
					<option value=''>보기</option>
					<option value='5'>5</option>
					<option value='10'>10</option>
					<option value='15'>15</option>
					<option value='20'>20</option>
				</select>
			</div>

			<div class="table">
				<table>
					<thead>
						<tr>
							<td>번호</td>
							<td>사업분야</td>
							<td>제목</td>
							<td>작성자</td>
							<td>공고등록</td>
							<td>접수마감</td>
							<td>조회수</td>
						</tr>
					</thead>
					<tbody>

					<?		
						for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
						{
							mysql_data_seek($result, $i);       
							// 가져올 레코드로 위치(포인터) 이동  
							$row = mysql_fetch_array($result);       
							// 하나의 레코드 가져오기
					
							$item_num        = $row[num];
							$item_id         = $row[id];
							$item_area       = $row[area];
							$item_name       = $row[name];
							$item_nick       = $row[nick];
							$item_hit        = $row[hit];
							$item_regist     = $row[regist_day];
							$item_regi_date  = substr($item_regist, 0, 10); 
							$item_due        = $row[due_day];
							$item_due_date   = substr($item_due, 0, 10); 

							// 공백이 있으면 &nbsp로 바꿔서 태그에 넣어야함
							$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
						
						?>

						<tr>
							<td><?=$number?></td>
							<td><?=$item_area?></td>
							<td>
								<a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?=$item_subject?></a>
							</td>
							<td><?=$item_nick?></td>
							<td><?=$item_regi_date?></td>
							<td><?=$item_due_date?></td>
							<td><?=$item_hit?></td>
						</tr>

						<?
							$number--;
						}
						?>

					</tbody>
				</table>
			</div>
			
			<div class="listButton">
				<a href="list.php">
					목록
				</a>
				<? 
					if($userid)
					{
				?>
				<a href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">
					글쓰기
				</a>
				<?
					}
				?>
			</div>

			<div id="tablePage"> 
				<i class="fa-solid fa-chevron-left"></i>
				<?
					// 게시판 목록 하단(페이지네이션)에 페이지 링크 번호 출력
					for ($i=1; $i<=$total_page; $i++)
					{
						if ($page == $i)     // 현재 페이지 번호 링크 안함
						{
							echo "<span class='pageCurrent pageNum'> $i </span>";
						}
						else
						{ 
							echo "<a href='list.php?page=$i&scale=$scale' class='pageOther pageNum'><span>$i</span></a>";
						}      
					}
				?>			
				<i class="fa-solid fa-chevron-right"></i>
			</div>
		</div>
	</article>

	<? include "../../common/sub_footer_board.html" ?>
</body>
</html>
