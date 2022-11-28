<? 
	session_start(); 

	//새글쓰기는 $table만 넘어옴
	//수정 $table, $mode=modify, $num
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
		<script>
			function check_input()
			 {
					if (!document.board_form.subject.value)
					{
							alert("제목을 입력하세요");    
							document.board_form.subject.focus();
							return;
					}
		
					if (!document.board_form.content.value)
					{
							alert("내용을 입력하세요");    
							document.board_form.content.focus();
							return;
					}
					document.board_form.submit();
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
					<?
						// 수정 / 새로쓰기에 따라 폼 다르게 넘겨줌
						// 수정
						if($mode=="modify")
						{
					?>
					<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>&scale=<?=$scale?>" enctype="multipart/form-data" class="writeBox"> 
					<?
						}
						// 새로쓰기
						else
						{
					?>
					<form  name="board_form" method="post" action="insert.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>" enctype="multipart/form-data" class="writeBox"> 
					<?
						}
					?>
					<div class="inputBox">
						<div>
							<label for="nick">작성자</label>
							<input type="text" value="<?=$usernick?>" name="nick" id="nick" disabled>
						</div>
						<div>
							<label for="subject">제목</label>
							<input type="text" name="subject" id="subject" placeholder="제목을 입력해주세요" value="<?=$item_subject?>">
						</div>
						<div>
							<label for="content">내용</label>
							<textarea name="content" id="content" placeholder="내용을 입력해주세요"><?=$item_content?></textarea>
						</div>
					</div>

					<div class="uploader">
						<div class="imgUp1 imgUp">
							<label for="upfile1"> 이미지파일1 <span><i class="fa-solid fa-circle-exclamation"></i> 최대 5MB까지 업로드 가능합니다.</span></label>
							<input type="file" name="upfile[]" id="upfile1">
						</div>
					<? 	
						if ($mode=="modify" && $item_file_0){ // 수정모드 + 첨부파일이 있으면
					?>
						<!-- 진짜 파일 이름  -->
						<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. 
							<input type="checkbox" name="del_file[]" value="0"> 삭제
						</div>
					<?
						}
					?>
						<div class="imgUp2 imgUp">
							<label for="upfile2"> 이미지파일2 <span><i class="fa-solid fa-circle-exclamation"></i> 최대 5MB까지 업로드 가능합니다.</span></label>
							<input type="file" name="upfile[]" id="upfile2">
						</div>
					<? 	
						if ($mode=="modify" && $item_file_1){
					?>
						<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
							<input type="checkbox" name="del_file[]" value="1"> 삭제
						</div>
					<?
						}
					?>
						<div class="imgUp3 imgUp">
							<label for="upfile3"> 이미지파일3 <span><i class="fa-solid fa-circle-exclamation"></i> 최대 5MB까지 업로드 가능합니다.</span></label>
							<input type="file" name="upfile[]" id="upfile3">
						</div>
					<? 	
						if ($mode=="modify" && $item_file_2){
					?>
						<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. 
							<input type="checkbox" name="del_file[]" value="2"> 삭제
						</div>
					<?
						}
					?>
					</div>

					<div class="writeButton">
						<a class="onBoard" onclick="check_input()">
						<?
							if($mode != "modify")
							{
						?>
						게시하기
						<?
						} else{
						?>
						수정하기
						<?
						} 
						?>
						</a>
						<a href="javascript:writeCancel('list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>')">목록으로</a>
					</div>
				</form>
			</div>
		</article>
		<script>
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
