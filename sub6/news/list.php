<? 
	session_start(); 

	$table = "news";
	$comment = "comment";
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>효성 | 홍보센터_뉴스센터</title>
    <link rel="stylesheet" href="../../common/css/common.css" />
    <link rel="stylesheet" href="../common/css/sub6common.css" />
    <link rel="stylesheet" href="../css/sub6_content1.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../../favicon.ico" />

    <script
      src="https://kit.fontawesome.com/1b35f9429d.js"
      crossorigin="anonymous"
    ></script>
    <script src="../../common/js/prefixfree.min.js"></script>
		
  </head>
<?
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../../lib/dbconn.php";
	
	if(!$scale)
		$scale=6;			// 한 화면에 표시되는 글 수

    if ($mode=="search"){
			if(!$search){
				echo("
					<script>
					window.alert('검색할 단어를 입력해 주세요');
						history.go(-1);
					</script>
				");
				exit;}
			$sql = "select * from $table where $select like '%$search%'order by num desc";
		}else{
			$sql = "select * from $table order by num desc";
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
      <h3>홍보센터</h3>
      <p>효성이 전하는 다양한 이야기들을 만나 보세요.</p>
    </div>

    <div class="subNav">
      <ul>
        <li><a href="./list.php" class="current">뉴스센터</a></li>
        <li><a href="../sub6_2.html">홍보자료</a></li>
        <li><a href="../sub6_3.html">소셜미디어</a></li>
      </ul>
    </div>

    <article id="content">
      <div class="titleArea">
        <div class="lineMap">
          <span><i class="fa-solid fa-house"></i> HOME</span> &gt;
          <span>홍보센터</span> &gt;
          <span>뉴스센터</span>
        </div>
        <h2>뉴스센터</h2>
        <p>효성 소식을 빠르고 정확하게 전해 드립니다.</p>
        <i class="fa-solid fa-chevron-down"></i>
        <i class="fa-solid fa-chevron-down"></i>
        <i class="fa-solid fa-chevron-down"></i>
      </div>

      <!-- 본문컨텐츠 영역 -->
      <div class="contentArea">

				<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search&page=<?=$page?>&scale=<?=$scale?>" class="searchBox"> 
					<div>
						<div class="searchSel">
							<label for="select" class="hidden">검색영역선택</label>
							<select name="select" id="select">
								<option value='subject'>제목</option>
								<option value='content'>내용</option>
								<option value='nick'>닉네임</option>
								<option value='name'>이름</option>
							</select>
						</div>
						<div class="searchInput">
							<label for="search" class="hidden">검색어입력</label>
							<input type="text" name="search" id="search" placeholder="검색어를 입력하세요">
							<button>검색</button>
						</div>
					</div>
				</form>

				<div class="list">
					<div class="listTop">
						<p>총 <span><?=$total_record ?></span> 개의 게시물이 있습니다.</p>
						<div>
							<label for="scale" class="hidden">보기설정</label>
							<select id="scale" name="scale" onchange="location.href='list.php?table=<?=$table?>&scale='+this.value">
								<option value=''>보기</option>
								<option value='6'>6개씩 보기</option>
								<option value='9'>9개씩 보기</option>
								<option value='12'>12개씩 보기</option>
								<option value='15'>15개씩 보기</option>
							</select>
						</div>
					</div>
					<ul class="">

					<?		
						for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
						{
								mysql_data_seek($result, $i);       
								// 가져올 레코드로 위치(포인터) 이동  
								$row = mysql_fetch_array($result);       
								// 하나의 레코드 가져오기
						
							$item_num     = $row[num];
							$item_id      = $row[id];
							$item_nick    = $row[nick];
							$item_hit     = $row[hit];
							$item_date    = $row[regist_day];
							$item_date = substr($item_date, 0, 10);  
							$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
							$item_content = str_replace(" ", "&nbsp;", $row[content]);
							$item_content = str_replace("\n", "<br>", $row[content]);

							if($row[file_copied_0]){
								$item_img = './data/'.$row[file_copied_0];
							} else if($row[file_copied_1]){
								$item_img = './data/'.$row[file_copied_1];
							} else if($row[file_copied_2]){
								$item_img = './data/'.$row[file_copied_2];
							} else{
								$item_img = './data/default.jpg';
							}

							$sql = "select * from $comment where parent=$item_num"; 
							$result2 = mysql_query($sql, $connect); 
							$num_comment = mysql_num_rows($result2); 

					?>
			
						<li>
							<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>">
								<div class="listImg">
									<img src="<?=$item_img?>" alt="">
								</div>
								<div class="listText">
									<dl>
										<dt><?= $item_subject ?></dt>
										<dd><?= $item_content ?></dd>
									</dl>
									<span><?= $item_date ?></span>
									<span><i class="fa-regular fa-eye"></i><?= $item_hit ?></span>
									<span><i class="fa-regular fa-comment-dots"></i>
										<? if($num_comment){
											echo " $num_comment ";
										} else {
											echo "0";
										}
										?>
									</span>
									<span><?= $item_nick ?></span>
								</div>
							</a>
						</li>
					
					<?
					$number--;
					}
					?>

					</ul>
				</div>

				<div class="listButton">
					<? 
						if($userid)
						{
					?>
					<a href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>" class="write">
						글쓰기
					</a>
					<?
						}
					?>
					<a href="list.php">
						목록
					</a>
				</div>

				<div id="listPage"> 
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
