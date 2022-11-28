<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
	
	$sql2 = "select * from comment where parent=$num"; 
	$result2 = mysql_query($sql2, $connect); 
	$num_comment = mysql_num_rows($result2);




	// pre, next
	$sqlNext = "select * from $table where num > $num ORDER BY num LIMIT 1";
	$resultNext = mysql_query($sqlNext, $connect); 
	$rowNext = mysql_fetch_array($resultNext);       
	$item_num_next   = $rowNext[num];
	$item_subject_next   = $rowNext[subject];
	$item_date_next      = $rowNext[regist_day];
	$item_date_next      = substr($item_date_next, 0, 10); 
	
	$sqlPre = "select * from $table where num < $num ORDER BY num desc LIMIT 1";
	$resultPre = mysql_query($sqlPre, $connect); 
	$rowPre = mysql_fetch_array($resultPre);      
	$item_num_pre   = $rowPre[num]; 
	$item_subject_pre   = $rowPre[subject];
	$item_date_pre      = $rowPre[regist_day];
	$item_date_pre      = substr($item_date_pre, 0, 10); 


	echo(
	"<script>
		console.log($item_subject_next);
		console.log($item_subject_pre);
	</script>"
	);


	$row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	// 배열에 넣어
	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

	$item_date    = $row[regist_day];
	$item_date    = substr($item_date, 0, 10); 
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = str_replace(" ", "&nbsp;", $row[content]);
	$item_content = str_replace("\n", "<br>", $row[content]);
	
	// 이미지 가져오기
	for ($i=0; $i<3; $i++) // 0~2
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			// 배열로 리턴
			// [이미지너비, 이미지높이, 이미지정보(타입/확장자)]

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			//이미지 너비 제한
			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else //첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num"; // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    ></>
    <script src="../../common/js/prefixfree.min.js"></script>
		<script>
			function del(href) 
			{
				if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
					document.location.href = href;
				}
			}
		</script>
  </head>
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
				<div class="view">
					<div class="viewBox">
						<div class="viewTitle1"><?= $item_subject ?></div>
						<div class="viewTitle2">
							<span>작성자 : <?= $item_nick ?></span> / 
							<span>게시일 : <?= $item_date ?></span> / 
							<span><i class="fa-solid fa-eye"></i> <?= $item_hit ?></span> / 
							<span><i class="fa-regular fa-comment-dots"></i> <?=$num_comment?></span>
						</div>
						
						<div class="viewContent">
							<div class="imgBox">
						<?
							for ($i=0; $i<3; $i++)
							{
								if ($image_copied[$i])
								{
									$img_name = $image_copied[$i];
									$img_name = "./data/".$img_name;
									$img_width = $image_width[$i];
									
									echo "<img src='$img_name' width='$img_width'>"."<br><br>";
								}
							}
						?>
							</div>
						<?= $item_content ?>
						</div>
					</div>

					<div class="comment"> 
						<? if($num_comment != 0){?>
						<div class="commentInner">
							<p>COMMENT</p>
						<?				// 입력하고 곧장보이기
							$sql = "select * from comment where parent='$item_num'";
							$comment_result = mysql_query($sql);

						while ($row_comment = mysql_fetch_array($comment_result))
						{
							$comment_num     = $row_comment[num];
							$comment_id      = $row_comment[id];
							$comment_nick    = $row_comment[nick];
							$comment_content = str_replace("\n", "<br>", $row_comment[content]);
							$comment_content = str_replace(" ", "&nbsp;", $comment_content);
							$comment_date    = $row_comment[regist_day];
						?>
							<div class="commentBox">
								<div class="commentTop">
									<p class="writeNick"><?=$comment_nick?></p>
									<p class="writeDate"><?=$comment_date?></p>
									<div class="commentBtn">
									<? 
										if($usernick=="admin" || $userid==$comment_id)
										echo "
										<a href=javascript:del('delete_comment.php?table=$table&num=$item_num&comment_num=$comment_num') class='delBtn comBtn'><i class='fa-solid fa-trash-can'></i> 삭제</a>
										"; 
									?>
									</div>
								</div>
								<p class="writeCont"><?=$comment_content?></p>
							</div>
						<?}?>	
						</div>		
						<?}?>
						<form class="commentWrite" name="comment_form" method="post" action="insert_comment.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>">  
						<? if(!$userid){?>
							<div>
								<textarea rows="5" cols="65" name="comment_content" placeholder="로그인 후 이용해주세요" disabled></textarea>
							</div>
							<div>
								<a href="#" class="noWorking">댓글작성</a>
							</div>
						<?} else{?>
							<div>
								<textarea rows="5" cols="65" name="comment_content"></textarea>
							</div>
							<div>
								<a href="#" onclick="check_input()">댓글작성</a>
							</div>
						<?}?>
						</form>
					</div> <!-- end of comment -->

					<div class="preNext">
						<ul>
							<li>
							<? if(!$item_subject_next){?>
								<div class="prenextInner">  
									<p class="prenextText">다음글 :</p>
									<p class="prenextSub" style="font-weight:400;">다음 게시물이 없습니다.</p>
								</div>
							<?} else{?>
								<a class="prenextInner exist" href="view.php?table=<?=$table?>&num=<?=$item_num_next?>&page=<?=$page?>&scale=<?=$scale?>">  
									<p class="prenextText">다음글 :</p>
									<p class="prenextSub exist"><?= $item_subject_next?></p>
									<p class="prenextDate"><?=$item_date_next?></p>
								</a>
							<?}?>
							</li>
							<li>
							<? if(!$item_subject_pre){?>
								<div class="prenextInner"> 
									<p class="prenextText">이전글 : </p>
									<p class="prenextSub" style="font-weight:400;">이전 게시물이 없습니다.</p>
								</div>
							<?} else{?>
								<a class="prenextInner exist" href="view.php?table=<?=$table?>&num=<?=$item_num_pre?>&page=<?=$page?>&scale=<?=$scale?>"> 
									<p class="prenextText">이전글 : </p>
									<p class="prenextSub exist"><?= $item_subject_pre?></p>
									<p class="prenextDate"><?=$item_date_pre?></p>
								</a>
							<?}?>
							</li>
						</ul>
					</div>
					
					<div class="viewButton">
						<a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">목록</a>
						<? 
							if($userid==$item_id || $userid=="admin" || $userlevel==1 )
							{
						?>
						<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
						<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>')" class="delete">삭제</a>
						<?
							}
						?>
						<? 
							if($userid)
							{
						?>
						<a href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>" class="write">글쓰기</a>
					
						<?
							}
						?>
						
					</div>
				</div>
			</div>
		</article>
    <? include "../../common/sub_footer_board.html" ?>
		<script>
			function check_input()
			{
				if (!document.comment_form.comment_content.value)
				{
					alert("내용을 입력하세요");    
					document.comment_form.comment_content.focus();
					return;
				}
				document.comment_form.submit();
				}

			function del(href) 
			{
					if(confirm("한번 삭제한 자료는 복구할 수 없습니다.\n\n정말 삭제하시겠습니까?")) {
									document.location.href = href;
					}
			}

			function modify(href) 
			{
					if(confirm("한번 삭제한 자료는 복구할 수 없습니다.\n\n정말 삭제하시겠습니까?")) {
									document.location.href = href;
					}
			}

			$(".noWorking").click(function(e){
				e.preventDefault();
			})
		</script>
  </body>
</html>
